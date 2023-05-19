<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function showTransactionHistory(){
        $userTransactions = DB::table('transactions')->where('');
    }
}
