<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showTransactionHistory(){
        $id = Auth::user()->id;
        $userTransactions = Transaction::where('buyer_id', $id)->get();
        return view('transaction.history', compact('userTransactions'));
    }
}
