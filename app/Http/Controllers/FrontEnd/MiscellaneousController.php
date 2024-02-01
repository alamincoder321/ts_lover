<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\BasicSettings\Basic;
use App\Models\Language;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class MiscellaneousController extends Controller
{
  public function getLanguage()
  {
    // get the current locale of this system
    if (Session::has('currentLocaleCode')) {
      $locale = Session::get('currentLocaleCode');
    }

    if (empty($locale)) {
      $language = Language::where('is_default', 1)->first();
    } else {
      $language = Language::where('code', $locale)->first();
      if (empty($language)) {
        $language = Language::query()->where('is_default', '=', 1)->first();
      }
    }

    return $language;
  }


  public function storeSubscriber(Request $request)
  {
    $rules = [
      'email_id' => 'required|email:rfc,dns|unique:subscribers'
    ];

    $messages = [
      'email_id.required' => 'Please enter your email address.',
      'email_id.unique' => 'This email address is already exist!'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return Response::json([
        'error' => $validator->getMessageBag()
      ], 400);
    }

    Subscriber::create($request->all());

    return Response::json([
      'success' => 'You have successfully subscribed to our newsletter.'
    ], 200);
  }


  public function changeLanguage(Request $request)
  {
    // put the selected language in session
    $langCode = $request['lang_code'];

    $request->session()->put('currentLocaleCode', $langCode);

    return redirect()->back();
  }


  public function getPageHeading($language)
  {
    $pageHeading = "";
    if (URL::current() == Route::is('contact')) {
      $pageHeading = $language->pageName()->select('contact_page_title')->first();
    } else if (URL::current() == Route::is('user.login')) {
      $pageHeading = $language->pageName()->select('login_page_title')->first();
    } else if (URL::current() == Route::is('user.signup')) {
      $pageHeading = $language->pageName()->select('signup_page_title')->first();
    }else if (URL::current() == Route::is('user.forget_password')) {
      $pageHeading = $language->pageName()->select('forget_password_page_title')->first();
    }elseif(URl::current() == Route::is('account.regiser')){
      $pageHeading = $language->pageName()->select('login_page_title')->first();
    }else{
      $pageHeading = null;
    }

    return $pageHeading;
  }


  public static function getBreadcrumb()
  {
    $breadcrumb = Basic::select('breadcrumb')->first();

    return $breadcrumb;
  }


  public function countAdView($id)
  {
    try {
      $ad = Advertisement::findOrFail($id);

      $ad->update([
        'views' => $ad->views + 1
      ]);

      return response()->json(['success' => 'Advertisement view counted successfully.']);
    } catch (ModelNotFoundException $e) {
      return response()->json(['error' => 'Sorry, something went wrong!']);
    }
  }


  public function serviceUnavailable()
  {
    $info = Basic::select('maintenance_img', 'maintenance_msg')->first();

    return view('errors.503', compact('info'));
  }
}
