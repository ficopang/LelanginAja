<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function submitWithdraw(Request $request){
        $amount = $request->amount;
        $user = User::find(1);
        if($user->balance<$amount){
            return back()->withErrors("Your Balance is not enough!");
        }
        $user->balance = $user->balance - $amount;
        $user->save();
        return redirect()->back()->withMessage("Withdrawal success!");
    }

    public function index(){
        $users = User::find(1);
        return view('withdraw',['users'=>$users]);
    }
}
