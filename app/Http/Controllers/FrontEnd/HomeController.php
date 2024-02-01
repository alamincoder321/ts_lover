<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\MiscellaneousController;
use App\Models\BasicSettings\Basic;
use App\Models\HomePage\Section;
use App\Models\Instrument\Equipment;
use App\Models\Journal\Blog;
use App\Models\HomePage\Partner;
use App\Models\Shop\Product;

class HomeController extends Controller
{

  public function index()
  {
    $queryResult['data'] = [];
    return view('frontend.home.index', $queryResult);
  }

  //offline
  public function offline()
  {
    return view('frontend.offline');
  }
}
