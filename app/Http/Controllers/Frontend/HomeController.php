<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Package;
use App\Models\Village;
use App\Models\Destination;
use App\Models\Transportation;
use App\Http\Controllers\Controller;
use App\Models\Testimony;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::with(['destinationtype', 'village'])->take(4)->get();
        $packages = Package::with(['destinations', 'transportations'])->latest()->get();
        $testimoni = Testimony::with('user')->find(1);
        return view('frontend.index', compact('destinations', 'packages', 'testimoni'));
    }

    public function destination()
    {
        $destinations = Destination::with(['destinationtype', 'village'])->paginate(6);
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
        $packages = Package::with(['destinations'])->paginate(6);
        return view('frontend.destination-packages', compact('packages'));
    }

    public function destinationPackagesDetail($id)
    {
        $package = Package::with(['destinations', 'transportations', 'hotel'])->where('id', $id)->first();
        return view('frontend.destination-packages-detail', compact('package'));
    }
}
