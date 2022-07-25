<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DestinationPackages;
use App\Models\Packages;
use Illuminate\Http\Request;

class DestinationPackagesController extends Controller
{
    public function index()
    {   
        $destinationpackages = DestinationPackages::with('destination', 'package')->get();
        return view('backend.destination-packages.index', compact('destinationpackages'));
    }

    public function create()
    {
        $destinations = Destination::latest()->get();
        $packages = Packages::latest()->get();
        return view('backend.destination-packages.add', compact('destinations', 'packages'));
    }

    public function store(Request $request)
    {
        DestinationPackages::create($request->all());

        $notification = [
            'message' => 'Destination Package Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination-packages.all')->with($notification);
    }

    public function edit($id)
    {
        $destinations = Destination::latest()->get();
        $packages = Packages::latest()->get();
        $data = DestinationPackages::findOrFail($id);
        return view('backend.destination-packages.edit', compact('destinations', 'packages', 'data'));
    }

    public function update(Request $request, $id)
    {
        $destinationpackage = DestinationPackages::where('id', $id)->first();
        $destinationpackage->update($request->all());

        $notification = [
            'message' => 'Destination Package Updated Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination-packages.all')->with($notification);
    }

    public function delete($id)
    {
        DestinationPackages::findOrFail($id)->delete();   

        $notification = [
            'message' => 'Destination Package Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination-packages.all')->with($notification);
    }
}
