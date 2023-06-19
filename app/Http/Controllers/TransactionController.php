<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showTransactionHistory()
    {
        $id = Auth::user()->id;
        $userTransactions = Transaction::where('buyer_id', $id)->get();
        return view('transaction.history', compact('userTransactions'));
    }

    public function checkoutPage()
    {
        $userId = auth()->id();
        $wonProducts = Product::whereHas('bids', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->whereDoesntHave('transaction')
            ->where('end_time', '<', Carbon::now()->addHours(7))
            ->get();

        $totalBidAmount = $wonProducts->sum(function ($product) {
            return $product->getTotalBidAmount();
        });

        return view('product.checkout', compact('wonProducts', 'totalBidAmount'));
    }

    public function saveShippingAddres(Request $request)
    {
        $user = User::find(auth()->id());
        $userId = auth()->id();
        $wonProducts = Product::whereHas('bids', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->whereDoesntHave('transaction')
            ->where('end_time', '<', Carbon::now()->addHours(7))
            ->get();

        // dd($wonProducts);

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $phoneNumber = $request->phoneNumber;
        $courier = $request->shipping;
        $address = $request->address;
        $city = $request->city;
        $province = $request->province;
        $postalCode = $request->postalCode;
        $cost = "50";
        $status = "shipped";

        $cardholderName = $request->cardholderName;
        $cardNumber = $request->cardNumber;
        $expMonth = $request->month;
        $expYear = $request->year;
        $cvc = $request->cvc;

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'shipping' => 'required',
            'address' => 'required|min:5|max:100',
            'city' => 'required',
            'province' => 'required',
            'postalCode' => 'required|integer|between:10000,99999',
            'cardholderName' => 'required',
            'cardNumber' => 'required|max:16|min:16',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:1,9999',
            'cvc' => 'required|integer|between:100,999'
        ]);

        foreach ($wonProducts as $product) {
            $transaction = new Transaction();
            $transaction->buyer_id = $user->id;
            $transaction->seller_id = $product->user_id;
            $transaction->product_id = $product->id;
            $transaction->final_price = $product->getTotalBidAmount();
            $transaction->status = "pending";
            $transaction->save();

            $shippingAddress = new Shipment();
            $shippingAddress->transaction_id = $transaction->id;
            $shippingAddress->firstName = $firstName;
            $shippingAddress->lastName = $lastName;
            $shippingAddress->phoneNumber = $phoneNumber;
            $shippingAddress->courier = $courier;
            $shippingAddress->address = $address;
            $shippingAddress->city = $city;
            $shippingAddress->province = $province;
            $shippingAddress->postal_code = $postalCode;
            $shippingAddress->cost = $cost;
            $shippingAddress->status = $status;
            $shippingAddress->save();

            $payments = new Payment();
            $payments->transaction_id = $transaction->id;
            $payments->cardholderName = $cardholderName;
            $payments->cardNumber = $cardNumber;
            $payments->expMonth = $expMonth;
            $payments->expYear = $expYear;
            $payments->cvc = $cvc;
            $payments->save();
        }
        return route('transaction.history');
    }
}
