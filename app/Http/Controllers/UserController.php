<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }

    public function getUserData()
    {
        $user = User::find(auth()->id());

        return view('account.edit', ['user' => $user]);
    }

    public function updateUserData(Request $request)
    {
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
        ]);

        $user = User::find(auth()->id());
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone;
        $user->address = $request->address;
        $user->save();

        return back()->with('success', 'Profile edited successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|alpha_num|min:8',
            'new_password' => 'required|alpha_num|min:8|required_with:confirm_new_password|same:confirm_new_password',
            'confirm_new_password' => 'required'
        ]);

        $user = User::find(auth()->id());
        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back()->with('success', 'Password updated successfully');
        } else {
            return back()->withErrors('Wrong password');
        }
    }

    public function deleteAccount(Request $request)
    {
        $user = User::find(auth()->id());
        if (Hash::check($request->password, $user->password)) {
            $user = User::findOrFail(auth()->id()); // Retrieve the user by ID

            $user->reports()->delete();
            $user->watchlist()->delete();
            $user->sentChats()->delete();
            $user->receivedChats()->delete();

            foreach ($user->sellerTransactions() as $tr) {
                $payment = Payment::where('transaction_id', $tr->id)->firstOrFail();
                $payment->remove();

                $shipment = Shipment::where('transaction_id', $tr->id)->firstOrFail();
                $shipment->remove();
            }

            foreach ($user->buyerTransactions() as $tr) {
                $payment = Payment::where('transaction_id', $tr->id)->firstOrFail();
                $payment->remove();

                $shipment = Shipment::where('transaction_id', $tr->id)->firstOrFail();
                $shipment->remove();
            }
            $user->bids()->delete();
            $user->products()->delete(); // Delete the associated product list
            $user->withdrawHistories()->delete();

            $user->delete(); // Delete the user

            Session::flush();
            Auth::logout();

            // Perform any additional actions or redirect as needed

            return redirect('login')->withSuccess('User deleted successfully.');
        } else {
            return back()->withErrors('Wrong password');
        }
    }
}
