<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Village;
use App\Models\Destination;
use App\Models\Package;
use App\Http\Controllers\Controller;
use App\Models\DestinationPackages;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Transportation;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::with(['destinationtype', 'village'])->take(4)->get();
        $packages = Package::with(['destinations', 'transportations'])->latest()->get();
        return view('frontend.index', compact('destinations', 'packages'));
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
        $transportations = Transportation::latest()->get();

        return view('frontend.destination-detail', compact('destination', 'desa', 'transportations'));
    }

    public function destinationPackages()
    {
        $packages = Package::with(['destinations'])->latest()->get();
        return view('frontend.destination-packages', compact('packages'));
    }

    public function destinationPackagesDetail($id)
    {
        $package = Package::with(['destinations', 'transportations', 'hotel'])->where('id', $id)->first();
        // return response()->json([
        //     'package' => $package,
        // ]);
        return view('frontend.destination-packages-detail', compact('package'));
    }

}
