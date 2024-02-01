<?php

namespace App\Http\Controllers\BackEnd\BasicSettings;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Http\Requests\MailFromAdminRequest;
use App\Models\BasicSettings\CookieAlert;
use App\Models\BasicSettings\MailTemplate;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class BasicController extends Controller
{

  public function pwa(Request $request)
  {
    $pwa = file_get_contents(public_path('manifest.json'));
    $pwa = json_decode($pwa, true);
    $data['pwa'] = $pwa;
    return view('backend.basic-settings.pwa', $data);
  }
  public function updatePwa(Request $request)
  {

    $allowedExts = array('jpg', 'png', 'jpeg');
    $icon128 = $request->file('icon_128');
    $icon256 = $request->file('icon_256');
    $icon512 = $request->file('icon_512');
    $rules = [
      'short_name' => 'required',
      'name' => 'required',
      'theme_color' => 'required',
      'background_color' => 'required',
      'icon_128' => [
        function ($attribute, $value, $fail) use ($icon128, $allowedExts) {
          if (!empty($icon128)) {
            $ext = $icon128->getClientOriginalExtension();
            if (!in_array($ext, $allowedExts)) {
              return $fail("Only png, jpg, jpeg image is allowed");
            }
          }
        },
        'dimensions:width=128,height=128'
      ],
      'icon_256' => [
        function ($attribute, $value, $fail) use ($icon256, $allowedExts) {
          if (!empty($icon256)) {
            $ext = $icon256->getClientOriginalExtension();
            if (!in_array($ext, $allowedExts)) {
              return $fail("Only png, jpg, jpeg image is allowed");
            }
          }
        },
        'dimensions:width=256,height=256'
      ],
      'icon_512' => [
        function ($attribute, $value, $fail) use ($icon512, $allowedExts) {
          if (!empty($icon512)) {
            $ext = $icon512->getClientOriginalExtension();
            if (!in_array($ext, $allowedExts)) {
              return $fail("Only png, jpg, jpeg image is allowed");
            }
          }
        },
        'dimensions:width=512,height=512'
      ]
    ];

    $request->validate($rules);
    $content = $request->except('_token', 'icon_128', 'icon_256', 'icon_512', 'pwa_offline_img', 'start_url');
    $content['start_url'] = './';
    $content['display'] = 'standalone';
    $content['theme_color'] = '#' . $request->theme_color;
    $content['background_color'] = '#' . $request->background_color;
    $preManifest = file_get_contents(public_path('manifest.json'));
    $preManifest = json_decode($preManifest, true);
    if ($request->hasFile('icon_128')) {
      $ext = $icon128->getClientOriginalExtension();
      $filename = uniqid() . '.' . $ext;
      $icon128->move(public_path('assets/images/'), $filename);
      $content['icons'][0] = [
        "src" => 'assets/images/' . $filename,
        "type" => "image/" . $ext,
        "sizes" => "128X128",
      ];
    } else {
      $content['icons'][0] = [
        "src" => $preManifest['icons'][0]['src'],
        "type" => $preManifest['icons'][0]['type'],
        "sizes" => $preManifest['icons'][0]['sizes'],
      ];
    }
    if ($request->hasFile('icon_256')) {
      $ext = $icon256->getClientOriginalExtension();
      $filename = uniqid() . '.' . $ext;
      $icon256->move(public_path('assets/images/'), $filename);

      $content['icons'][1] = [
        "src" => 'assets/images/' . $filename,
        "type" => "image/" . $ext,
        "sizes" => "256X256",
      ];
    } else {
      $content['icons'][1] = [
        "src" => $preManifest['icons'][1]['src'],
        "type" => $preManifest['icons'][1]['type'],
        "sizes" => $preManifest['icons'][1]['sizes']
      ];
    }

    if ($request->hasFile('icon_512')) {
      $ext = $icon512->getClientOriginalExtension();
      $filename = uniqid() . '.' . $ext;
      $icon512->move(public_path('assets/images/'), $filename);

      $content['icons'][2] = [
        "src" => 'assets/images/' . $filename,
        "type" => "image/" . $ext,
        "sizes" => "512X512",
      ];

      $content['icons'][3] = [
        "src" => 'assets/images/' . $filename,
        "type" => "image/" . $ext,
        "sizes" => "512X512",
        "purpose" => "maskable"
      ];
    } else {
      $content['icons'][2] = [
        "src" => $preManifest['icons'][2]['src'],
        "type" => $preManifest['icons'][2]['type'],
        "sizes" => $preManifest['icons'][2]['sizes']
      ];

      $content['icons'][3] = [
        "src" => $preManifest['icons'][3]['src'],
        "type" => $preManifest['icons'][3]['type'],
        "sizes" => $preManifest['icons'][3]['sizes'],
        "purpose" => $preManifest['icons'][3]['purpose']
      ];
    }
    $content = json_encode($content);
    file_put_contents(public_path('manifest.json'), $content);

    return back()->with('success', 'Updated Successfully');
  }
  //general_settings
  public function general_settings()
  {

    $data = [];
    $data['data'] = DB::table('basic_settings')->first();
    return view('backend.basic-settings.general-settings', $data);
  }
  //update general settings
  public function update_general_setting(Request $request)
  {

    $data = DB::table('basic_settings')->first();
    $rules = [];

    $rules = [
      'website_title' => 'required',
      'base_currency_symbol' => 'required',
      'base_currency_symbol_position' => 'required',
      'base_currency_text' => 'required',
      'base_currency_text_position' => 'required',
      'base_currency_rate' => 'required|numeric',
      'today_gain' => 'required',
      'referral_doller' => 'required',
      'minimum_withdraw' => 'required'
    ];




    if (!$request->filled('logo') && is_null($data->logo)) {
      $rules['logo'] = 'required';
    }
    if ($request->hasFile('logo')) {
      $rules['logo'] = new ImageMimeTypeRule();
    }

    $validator = Validator::make($request->all(), $rules);


    if ($validator->fails()) {
      dd($validator->errors());
      return redirect()->back()->withErrors($validator->errors());
    }
    if ($request->hasFile('logo')) {
      $logoName = UploadFile::update(public_path('assets/img/'), $request->file('logo'), $data->logo);
    } else {
      $logoName = $data->logo;
    }
    if ($request->hasFile('favicon')) {
      $iconName = UploadFile::update(public_path('assets/img/'), $request->file('favicon'), $data->favicon);
    } else {
      $iconName = $data->favicon;
    }

    //update or insert data to basic settigs table
    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'website_title' => $request->website_title,
        'logo' => $logoName,
        'favicon' => $iconName,
        'theme_version' => 1,
        'primary_color' => 2,
        'secondary_color' => 1,
        'breadcrumb_overlay_color' => 1,
        'breadcrumb_overlay_opacity' => 1,
        'base_currency_symbol' => $request->base_currency_symbol,
        'base_currency_symbol_position' => $request->base_currency_symbol_position,
        'base_currency_text' => $request->base_currency_text,
        'base_currency_text_position' => $request->base_currency_text_position,
        'base_currency_rate' => $request->base_currency_rate,
        'today_gain' => $request->today_gain,
        'referral_doller' => $request->referral_doller,
        'minimum_withdraw' => $request->minimum_withdraw
      ]
    );
    Session::flash('success', 'Update general settings successfully.!');

    return redirect()->back();
  }
  public function mailFromAdmin()
  {
    $data = DB::table('basic_settings')
    ->select('smtp_status', 'smtp_host', 'smtp_port', 'encryption', 'smtp_username', 'smtp_password', 'from_mail', 'from_name')
    ->first();
    return view('backend.basic-settings.email.mail-from-admin', ['data' => $data]);
  }
  public function updateMailFromAdmin(MailFromAdminRequest $request)
  {
    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'smtp_status' => $request->smtp_status,
        'smtp_host' => $request->smtp_host,
        'smtp_port' => $request->smtp_port,
        'encryption' => $request->encryption,
        'smtp_username' => $request->smtp_username,
        'smtp_password' => $request->smtp_password,
        'from_mail' => $request->from_mail,
        'from_name' => $request->from_name
      ]
    );

    Session::flash('success', 'Mail info updated successfully!');

    return redirect()->back();
  }

  public function mailToAdmin()
  {
    $data = DB::table('basic_settings')->select('to_mail')->first();
    return view('backend.basic-settings.email.mail-to-admin', ['data' => $data]);
  }

  public function updateMailToAdmin(Request $request)
  {
    $rule = [
      'to_mail' => 'required'
    ];
    $message = [
      'to_mail.required' => 'The mail address field is required.'
    ];

    $validator = Validator::make($request->all(), $rule, $message);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      ['to_mail' => $request->to_mail]
    );

    Session::flash('success', 'Mail info updated successfully!');

    return redirect()->back();
  }
  public function plugins()
  {
    $data = DB::table('basic_settings')
    ->select('disqus_status', 'disqus_short_name', 'google_recaptcha_status', 'google_recaptcha_site_key', 'google_recaptcha_secret_key', 'whatsapp_status', 'whatsapp_number', 'whatsapp_header_title', 'whatsapp_popup_status', 'whatsapp_popup_message', 'facebook_login_status', 'facebook_app_id', 'facebook_app_secret', 'google_login_status', 'google_client_id', 'google_client_secret', 'tawkto_status', 'tawkto_direct_chat_link')
    ->first();

    return view('backend.basic-settings.plugins', ['data' => $data]);
  }

  public function updateDisqus(Request $request)
  {
    $rules = [
      'disqus_status' => 'required',
      'disqus_short_name' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'disqus_status' => $request->disqus_status,
        'disqus_short_name' => $request->disqus_short_name
      ]
    );

    Session::flash('success', 'Disqus info updated successfully!');

    return redirect()->back();
  }

  public function updateTawkTo(Request $request)
  {
    $rules = [
      'tawkto_status' => 'required',
      'tawkto_direct_chat_link' => 'required'
    ];

    $messages = [
      'tawkto_status.required' => 'The tawk.to status field is required.',
      'tawkto_direct_chat_link.required' => 'The tawk.to direct chat link field is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'tawkto_status' => $request->tawkto_status,
        'tawkto_direct_chat_link' => $request->tawkto_direct_chat_link
      ]
    );

    Session::flash('success', 'Tawk.To info updated successfully!');

    return redirect()->back();
  }

  public function updateRecaptcha(Request $request)
  {
    $rules = [
      'google_recaptcha_status' => 'required',
      'google_recaptcha_site_key' => 'required',
      'google_recaptcha_secret_key' => 'required'
    ];

    $messages = [
      'google_recaptcha_status.required' => 'The recaptcha status field is required.',
      'google_recaptcha_site_key.required' => 'The recaptcha site key field is required.',
      'google_recaptcha_secret_key.required' => 'The recaptcha secret key field is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'google_recaptcha_status' => $request->google_recaptcha_status,
        'google_recaptcha_site_key' => $request->google_recaptcha_site_key,
        'google_recaptcha_secret_key' => $request->google_recaptcha_secret_key
      ]
    );

    $array = [
      'NOCAPTCHA_SECRET' => $request->google_recaptcha_secret_key,
      'NOCAPTCHA_SITEKEY' => $request->google_recaptcha_site_key
    ];

    setEnvironmentValue($array);
    Artisan::call('config:clear');

    Session::flash('success', 'Recaptcha info updated successfully!');

    return redirect()->back();
  }

  public function updateFacebook(Request $request)
  {
    $rules = [
      'facebook_login_status' => 'required',
      'facebook_app_id' => 'required',
      'facebook_app_secret' => 'required'
    ];

    $messages = [
      'facebook_login_status.required' => 'The login status field is required.',
      'facebook_app_id.required' => 'The app id field is required.',
      'facebook_app_secret.required' => 'The app secret field is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'facebook_login_status' => $request->facebook_login_status,
        'facebook_app_id' => $request->facebook_app_id,
        'facebook_app_secret' => $request->facebook_app_secret
      ]
    );

    $array = [
      'FACEBOOK_CLIENT_ID' => $request->facebook_app_id,
      'FACEBOOK_CLIENT_SECRET' => $request->facebook_app_secret,
      'FACEBOOK_CALLBACK_URL' => url('/user/login/facebook/callback')
    ];

    setEnvironmentValue($array);
    Artisan::call('config:clear');

    Session::flash('success', 'Facebook info updated successfully!');

    return redirect()->back();
  }

  public function updateGoogle(Request $request)
  {
    $rules = [
      'google_login_status' => 'required',
      'google_client_id' => 'required',
      'google_client_secret' => 'required'
    ];

    $messages = [
      'google_login_status.required' => 'The login status field is required.',
      'google_client_id.required' => 'The client id field is required.',
      'google_client_secret.required' => 'The client secret field is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'google_login_status' => $request->google_login_status,
        'google_client_id' => $request->google_client_id,
        'google_client_secret' => $request->google_client_secret
      ]
    );

    $array = [
      'GOOGLE_CLIENT_ID' => $request->google_client_id,
      'GOOGLE_CLIENT_SECRET' => $request->google_client_secret,
      'GOOGLE_CALLBACK_URL' => url('/user/login/google/callback')
    ];

    setEnvironmentValue($array);
    Artisan::call('config:clear');

    Session::flash('success', 'Google info updated successfully!');

    return redirect()->back();
  }

  public function updateWhatsApp(Request $request)
  {
    $rules = [
      'whatsapp_status' => 'required',
      'whatsapp_number' => 'required',
      'whatsapp_header_title' => 'required',
      'whatsapp_popup_status' => 'required',
      'whatsapp_popup_message' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'whatsapp_status' => $request->whatsapp_status,
        'whatsapp_number' => $request->whatsapp_number,
        'whatsapp_header_title' => $request->whatsapp_header_title,
        'whatsapp_popup_status' => $request->whatsapp_popup_status,
        'whatsapp_popup_message' => $request->whatsapp_popup_message
      ]
    );

    Session::flash('success', 'WhatsApp info updated successfully!');

    return redirect()->back();
  }
  public function maintenance()
  {
    $data = DB::table('basic_settings')
    ->select('maintenance_img', 'maintenance_status', 'maintenance_msg', 'bypass_token')
    ->first();

    return view('backend.basic-settings.maintenance', ['data' => $data]);
  }

  public function updateMaintenance(Request $request)
  {
    $data = DB::table('basic_settings')->select('maintenance_img')->first();

    $rules = $messages = [];

    if (!$request->filled('maintenance_img') && is_null($data->maintenance_img)) {
      $rules['maintenance_img'] = 'required';

      $messages['maintenance_img.required'] = 'The maintenance image field is required.';
    }
    if ($request->hasFile('maintenance_img')) {
      $rules['maintenance_img'] = new ImageMimeTypeRule();
    }

    $rules['maintenance_status'] = 'required';
    $rules['maintenance_msg'] = 'required';

    $messages['maintenance_msg.required'] = 'The maintenance message field is required.';

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    if ($request->hasFile('maintenance_img')) {
      $imageName = UploadFile::update(public_path('assets/img/'), $request->file('maintenance_img'), $data->maintenance_img);
    }

    DB::table('basic_settings')->updateOrInsert(
      ['uniqid' => 12345],
      [
        'maintenance_img' => $request->hasFile('maintenance_img') ? $imageName : $data->maintenance_img,
        'maintenance_status' => $request->maintenance_status,
        'maintenance_msg' => Purifier::clean($request->maintenance_msg),
        'bypass_token' => $request->bypass_token
      ]
    );

    if ($request->maintenance_status == 1) {
      $link = route('service_unavailable');

      Artisan::call('down --redirect=' . $link . ' --secret="' . $request->bypass_token . '"');
    } else {
      Artisan::call('up');
    }

    Session::flash('success', 'Maintenance Info updated successfully!');

    return redirect()->back();
  }
  public function cookieAlert(Request $request)
  {
    // then, get the cookie alert info of that language from db
    $information['data'] = CookieAlert::first();
    return view('backend.basic-settings.cookie-alert', $information);
  }

  public function updateCookieAlert(Request $request)
  {
    $rules = [
      'cookie_alert_status' => 'required',
      'cookie_alert_btn_text' => 'required',
      'cookie_alert_text' => 'required'
    ];

    $message = [
      'cookie_alert_btn_text.required' => 'The cookie alert button text field is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $message);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }
    $data = CookieAlert::first();
    if (empty($data)) {
      CookieAlert::query()->create($request->except(['language_id', 'cookie_alert_text']) + [
        'cookie_alert_text' => clean($request->cookie_alert_text)
      ]);
    } else {
      $data->update($request->all());
    }

    Session::flash('success', 'Cookie alert info updated successfully!');

    return Response::json(['status' => 'success'], 200);
  }
  public function index()
  {
    $templates = MailTemplate::all();

    return view('backend.basic-settings.email.templates', compact('templates'));
  }

  public function edit($id)
  {
    $templateInfo = MailTemplate::findOrFail($id);

    return view('backend.basic-settings.email.edit-template', compact('templateInfo'));
  }

  public function update(Request $request, $id)
  {
    $rules = [
      'mail_subject' => 'required',
      'mail_body' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    MailTemplate::findOrFail($id)->update($request->except('mail_type', 'mail_body') + [
      'mail_body' => Purifier::clean($request->mail_body)
    ]);

    Session::flash('success', 'Mail template updated successfully!');

    return redirect()->back();
  }


}
