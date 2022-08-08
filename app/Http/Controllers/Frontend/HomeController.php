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
        $village = Village::where('id', $destination->village_id)->first();
        $district = District::where('id', $village->district_id)->first();
        $regency = Regency::where('id', $district->regency_id)->first();
        $province = Province::where('id', $regency->province_id)->first();
        return view('frontend.destination-detail', compact('destination', 'village', 'district', 'regency', 'province'));
    }

    public function destinationPackages()
    {
        $packages = Package::with(['destinations'])->latest()->get();
        return view('frontend.destination-packages', compact('packages'));
    }

    public function destinationPackagesDetail($id)
    {
        $package = DestinationPackages::with(['destinations', 'transportations'])->where('id', $id)->get();
        // $name_package = Package::where('id', $id)->first();
        return view('frontend.destination-packages-detail', compact('package'));
    }

}
