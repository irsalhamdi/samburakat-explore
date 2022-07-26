<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function pending()
    {
        $bookings = Booking::with('user', 'destination', 'package', 'transportation')
            ->where('payment_proof', 'unpaid')
            ->latest()->get();
        return view('backend.booking.pending', compact('bookings',));
    }
    
    public function success()
    {   
        $bookings = Booking::with('user', 'destination', 'package', 'transportation')
            ->where('payment_proof', 'paid')->latest()->get();
        return view('backend.booking.success', compact('bookings'));
    }

    public function verify($id)
    {
        Booking::findOrFail($id)->update(['payment_proof' => 'confirmed']);

        $notification = [
            'message' => 'Booking Status updated Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

}
