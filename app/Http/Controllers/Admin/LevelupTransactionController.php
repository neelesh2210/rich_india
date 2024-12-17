<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LevelUpWallet;
use App\Http\Controllers\Controller;

class LevelupTransactionController extends Controller
{

    public function index(Request $request) {
        $search_type = $request->search_type;
        $search_from = $request->search_from;
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $levelup_transactions = LevelUpWallet::when($search_type, function($query) use ($search_type){
            $query->where('type',$search_type);
        })->when($search_from, function($query) use ($search_from){
            $query->where('from',$search_from);
        })->when($search_date, function($query) use ($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $query=$query->whereBetween('created_at', [$startDate, $endDate]);

        })->when($search_key, function($query) use ($search_key){
            $query->whereHas('user', function($que) use ($search_key){
                $que->where(function($qu) use ($search_key){
                    $qu->where('name','like','%'.$search_key.'%')
                    ->orWhere('email','like','%'.$search_key.'%')
                    ->orWhere('phone','like','%'.$search_key.'%')
                    ->orWhere('referrer_code','like','%'.$search_key.'%');
                });
            });
        })->with('user')->latest()->paginate(10);

        $levelup_credit_balance = LevelUpWallet::where('type','credit')->sum('amount');
        $levelup_debit_balance = LevelUpWallet::where('type','debit')->sum('amount');
        $levelup_remainning_balance = $levelup_credit_balance - $levelup_debit_balance;

        return view('admin.levelup_transaction.index',compact('search_type', 'search_from', 'search_date', 'search_key', 'levelup_transactions', 'levelup_credit_balance', 'levelup_debit_balance', 'levelup_remainning_balance'),['page_title'=>'Levelup Transactions']);
    }

}
