<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Village;
use App\Models\Destination;
use App\Models\Package;
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
        $desa = Village::with('district')->where('id', $destination->village_id)->first();
        return view('frontend.destination-detail', compact('destination', 'desa'));
    }

    public function destinationPackages()
    {
        $packages = Package::with(['destinations', 'transportations'])->latest()->get();
        return view('frontend.destination-packages', compact('packages'));
    }

    public function destinationPackagesDetail($id)
    {
        $package = Package::with(['destinations', 'transportations'])->where('id', $id)->first();
        // $name_package = Package::where('id', $id)->first();
        return view('frontend.destination-packages-detail', compact('package'));
    }

}
