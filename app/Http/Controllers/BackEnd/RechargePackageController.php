<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Package;
use App\Models\PackageContent;
use App\Models\RechargePackage;
use App\Models\RechargePackageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RechargePackageController extends Controller
{
  public function index(Request $request)
  {
    // first, get the language info from db
    $language = Language::query()->where('code', '=', $request->language)->first();
    $information['language'] = $language;
    // then, get the packages of that language from db
    $information['packages'] = RechargePackage::query()
      ->join('recharge_package_contents', 'recharge_packages.id', '=', 'recharge_package_contents.recharge_package_id')
      ->where('recharge_package_contents.language_id', '=', $language->id)
      ->select('recharge_packages.*', 'recharge_package_contents.title')
      ->get();
    // also, get all the languages from db
    $information['langs'] = Language::all();
    return view('backend.recharge-packages.index', $information);
  }

  public function store(Request $request)
  {
    $rules = [
      'language_id' => 'required',
      'title' => 'required',
      'icon' => 'required',
      'doller' => 'required',
      'serial_number' => 'required'
    ];

    $message = [
      'language_id.required' => 'The language field is required.'
    ];
    $validator = Validator::make($request->all(), $rules, $message);
    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }
    $data = new RechargePackage();
    $data->doller = $request->doller;
    $data->icon = $request->icon;
    $data->serial_number = $request->serial_number;
    $data->status =  true;
    $data->save();

    $contents = [];
    $contents = [
      'recharge_package_id' => $data->id,
      'language_id' => $request->language_id,
      'title' => $request->title,
    ];
    RechargePackageContent::create($contents);
    Session::flash('success', 'New Recharge Package Added Successfully!');
    return Response::json(['status' => 'success'], 200);
  }
  public function edit(Request $request, RechargePackage $package)
  {
    $langId = $request->input('language');
    $language = Language::findOrFail($langId);
    $data['package'] = $package;
    $data['package_content'] = $package->package_content()->where('language_id', $language->id)->first();
    $data['language'] = $language;
    return view('backend.recharge-packages.edit', $data);
  }

  public function update(Request $request)
  {
    $rules = [
      'title' => 'required',
      // 'doller' => 'required',
      // // 'icon' => 'required',
      // 'days' => 'required',
      // 'percentage' => 'required',
      // 'serial_number' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }
    $package = RechargePackage::query()->find($request->package_id);
    $package->update($request->all());

    RechargePackageContent::updateOrCreate([
      'id' => $request->package_content_id
    ], [
      'title' => $request->title,
      'language_id' => $request->language_id,
      'recharge_package_id' => $package->id
    ]);

    Session::flash('success', 'Recharge package updated successfully!');
    return Response::json(['status' => 'success'], 200);
  }

  public function destroy($id)
  {
    $package = RechargePackage::query()->find($id);
    $package->delete();
    return redirect()->back()->with('success', 'Recharge package deleted successfully!');
  }
  public function updatePackageActiveStatus(Request $request, $id)
  {
    $package = RechargePackage::query()->find($id);

    if ($request['active'] == 1) {
      $package->update([
        'status' => 1
      ]);
    } else {
      $package->update([
        'status' => 0
      ]);
    }
    Session::flash('success', 'Recharge Package status updated successfully!');
    return redirect()->back();
  }
  public function updatePackageFeaturedStatus(Request $request, $id)
  {

    $package = RechargePackage::query()->find($id);
    if ($request['featured'] == 1) {
      $package->update([
        'featured' => true
      ]);
    } else {
      $package->update([
        'featured' => false
      ]);
    }

    Session::flash('success', 'Recharge Package Featured status updated successfully!');

    return redirect()->back();
  }
}
