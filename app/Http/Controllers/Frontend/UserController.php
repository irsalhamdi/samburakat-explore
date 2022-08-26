<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('frontend.dashboard.profile', compact('user'));
    }

    public function update(Request $request)
    {  
        $user = Auth::User();
        $user->update($request->all());
        return redirect()->route('profile');
    }

    public function transaction()
    {
       $transactions =  Booking::with('user', 'destination') ->where('user_id', Auth::user()->id)->whereNotNull('destination_id')->get();
       $bookings = Booking::with('user', 'package')->where('user_id', Auth::user()->id)->whereNotNull('package_id')->get();
       return view('frontend.dashboard.transaction', compact('transactions', 'bookings'));
    }

    public function transactionDetail($id)
    {   
        $transaction = Booking::with('user', 'destination', 'transportation')->where('id', $id)->whereNotNull('destination_id')->first();
        $booking = Booking::with('user', 'package', 'transportation')->where('id', $id)->whereNotNull('package_id')->first();
        return view('frontend.dashboard.transaction-detail', compact('transaction', 'booking'));
    }

    public function proof(Request $request, $id)
    {
        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/payment-proof/' . $name);
        $url = 'upload/payment-proof/' . $name;

        Booking::findOrfail($id)->update([
            'payment_proof' => 'paid',
            'image' => $url,
        ]);

        return redirect()->route('transaction-detail',$id);
    }
}
