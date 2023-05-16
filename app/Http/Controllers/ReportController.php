<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function submitReport(Request $request){

        $this->validate($request,[
            'product_id' => 'required|min:5|max:20',
            'report_text' => 'required|min:5|max:100'
        ]);

        $reportText = $request->report_text;
        $productID = $request->product_id;

        if(DB::table('products')->where('id', $productID)->exists()==False){
            return back()->withErrors("Product ID is not found!");
        }

        $report = new ProductReport();
        $report->user_id = 1;
        $report->product_id = $productID;
        $report->text = $reportText;
        $report->save();
        return redirect('/');

    }
}
