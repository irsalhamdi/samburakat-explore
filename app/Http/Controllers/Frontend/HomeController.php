<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Packages;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\DestinationPackages;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::with(['destinationtype', 'village'])->latest()->get();
        return view('frontend.index', compact('destinations'));
    }

    public function destination()
    {
        $destinations = Destination::with(['destinationtype', 'village'])->latest()->get();
        return view('frontend.destination', compact('destinations'));
    }

    public function destinationDetail($id)
    {
        $destination = Destination::with(['galleries'])->where('id', $id)->first();
        return view('frontend.destination-detail', compact('destination'));
    }

    public function destinationPackages()
    {
        $packages = Packages::latest()->get();
        return view('frontend.destination-packages', compact('packages'));
    }

    public function destinationPackagesDetail($id)
    {
        return view('frontend.destination-packages-detail');
    }

}
