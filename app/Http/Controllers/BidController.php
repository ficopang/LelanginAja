<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BidController extends Controller
{
    public function getProductInfo($productId)
    {
        $product = Product::findOrFail($productId);
        $endTime = $product->end_time;
        $currentPrice = $product->getTotalBidAmount();
        $lastBidderFirstName = $product->bids()->latest('created_at')->first() ? $product->bids()->latest('created_at')->first()->user->first_name : null; // Assuming you have a method to retrieve the last bidder's first name

        return response()->json([
            'end_time' => $endTime,
            'current_price' => $currentPrice,
            'last_bidder_first_name' => $lastBidderFirstName,
        ]);
    }

    public function placeBid(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Validate the bid request
        $validator = Validator::make($request->all(), [
            'bid_amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        // Check if bid time is within 30 seconds of the end time
        $endTime = Carbon::parse($product->end_time);
        $bidTime = Carbon::now()->addHours(7);
        $bidTimeDiff = $bidTime->diffInSeconds($endTime);

        if ($bidTime->greaterThan($endTime)) {
            return response()->json(['error' => 'Time limit exceeded'], 400);
        }
        if ($bidTimeDiff <= 30) {
            $endTime = $bidTime->addSeconds(32); // Set the end time to 30 seconds from the current bid time
        }

        // Place the bid and update the end time
        // Your logic for placing the bid goes here
        $bid = new Bid();
        $bid->user_id = auth()->id();
        $bid->product_id = $productId;
        $bid->bid_amount = $request->input('bid_amount');
        $bid->save();

        // Update the product's end time
        $product->end_time = $endTime;
        $product->save();

        return response()->json(['message' => 'Bid placed successfully']);
    }
}
