<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\UserWallet;
use Illuminate\Http\Request;

class WalletTransactionController extends Controller
{

    public function index(){
        $transactions = UserWallet::where('user_id',Auth::guard('web')->user()->id)->orderBy('id','desc')->paginate(10);

        return view('user_dashboard.wallet_transaction.index',compact('transactions'),['page_title'=>'Wallet Transaction']);
    }

}
