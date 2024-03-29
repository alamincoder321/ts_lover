<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
  public function index(Request $request)
  {
    $data['sitemaps'] = Sitemap::orderBy('id', 'DESC')->paginate(10);
    return view('admin.sitemap.index', $data);
  }

  public function store(Request $request)
  {
    $data = new Sitemap();
    $input = $request->all();

    @mkdir(public_path('assets/front/files'), 0755, true);
    $filename = 'sitemap' . uniqid() . '.xml';
    SitemapGenerator::create($request->sitemap_url)->writeToFile(public_path('assets/front/files/' . $filename));
    $input['filename']    = $filename;
    $input['sitemap_url'] = $request->sitemap_url;
    $data->fill($input)->save();

    Session::flash('success', 'Sitemap Generate Successfully');
    return "success";
  }

  public function download(Request $request)
  {
    return response()->download(public_path('assets/front/files/' . $request->filename));
  }

  public function update(Request $request)
  {
    $data  = Sitemap::find($request->id);
    $input = $request->all();
    @unlink(public_path('assets/front/files/' . $data->filename));

    $filename = 'sitemap' . uniqid() . '.xml';
    SitemapGenerator::create($data->sitemap_url)->writeToFile(public_path('assets/front/files/' . $filename));
    $input['filename']  = $filename;

    $data->update($input);
    Session::flash('success', 'Feed updated successfully!');
    return back();
  }

  public function delete($id)
  {
    $sitemap = Sitemap::find($id);
    @unlink(public_path('assets/front/files/' . $sitemap->filename));
    $sitemap->delete();

    Session::flash('success', 'Sitemap file deleted successfully!');
    return back();
  }
}
