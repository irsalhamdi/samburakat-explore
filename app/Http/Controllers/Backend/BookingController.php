<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function pending()
    {
        return view('backend.booking.pending');
    }

    public function success()
    {
        return view('backend.booking.success');
    }
}
