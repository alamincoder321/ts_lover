<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\BasicSettings\Basic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CronjobController extends Controller
{
  public function index(Request $request){

    $todayPer = Basic::select('today_gain')->first();
    $todayGain = $todayPer->today_gain ?? 0;
    $accounts = Account::query()
      ->where('status', true)
      ->where(DB::raw('limit_gain_coin'), '>', DB::raw('total_gain_coin'))
      ->get();

      foreach($accounts as $account){
        $accTotalGain = $account->total_gain_coin;
        $todayWillGive = ($todayGain / 100) * $account->package_coin;
        $currentTotalGain = $accTotalGain + $todayWillGive;
        if($currentTotalGain >= $account->limit_gain_coin){
           $todayWillGive = $account->limit_gain_coin - $account->total_gain_coin;
        }

        $acc = Account::find($account->id);
        $acc->increment('total_gain_coin', $todayWillGive);
        $acc->decrement('have_days', 1);
        $acc->last_day_gain_coin = $todayWillGive;
        $acc->save();
      }

  }


}
