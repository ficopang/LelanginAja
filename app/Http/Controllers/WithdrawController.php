<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WithdrawHistory;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function submitWithdraw(Request $request){
        $amount = $request->amount;
        $user = User::find(auth()->id());
        if($user->balance<$amount){
            return back()->withErrors("Your Balance is not enough!");
        }
        $user->balance = $user->balance - $amount;
        $user->save();

        $withdraw = new WithdrawHistory();
        $withdraw->user_id = $user->id;
        $withdraw->description = "Withdraw";
        $withdraw->amount = $amount;
        $withdraw->save();

        return redirect()->back()->withMessage("Withdrawal success!");
    }

    public function index(){
        $user = User::find(auth()->id());
        $withdraws = $user->withdrawHistories;
        return view('account.withdraw',compact('withdraws'));
    }
}
