<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::FindOrfail($id);
        return view('frontend.dashboard.profile', compact('user'));
    }

    public function transaction($id)
    {
       $transactions =  Booking::with('user', 'destination')->where('user_id', $id)->get();
       return view('frontend.dashboard.transaction', compact('transactions'));
    }

    public function transactionDetail($id)
    {   
        $transaction = Booking::with('user', 'destination', 'transportation')->where('id', $id)->first();
        return view('frontend.dashboard.transaction-detail', compact('transaction'));
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
