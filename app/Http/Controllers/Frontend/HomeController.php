<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function destination()
    {
        return view('frontend.destination');
    }

    public function destinationDetail()
    {
        return view('frontend.destination-detail');
    }

    public function destinationPackages()
    {
        return view('frontend.destination-packages');
    }

    public function destinationPackagesDetail()
    {
        return view('frontend.destination-packages-detail');
    }

}
