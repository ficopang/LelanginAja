<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index($productId)
    {
        $product = Product::findOrFail($productId);

        return view('product.report', compact('product', 'product'));
    }

    public function submitReport(Request $request, $productId)
    {
        $this->validate($request, [
            'report_text' => 'required|min:5|max:100'
        ]);

        $reportText = $request->report_text;

        if (DB::table('products')->where('id', $productId)->exists() == False) {
            return back()->withErrors("Product ID is not found!");
        }

        $report = new ProductReport();
        $report->user_id = 1;
        $report->product_id = $productId;
        $report->text = $reportText;
        $report->save();
        return redirect('/');
    }
}
