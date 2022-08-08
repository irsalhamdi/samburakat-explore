<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('backend.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('backend.packages.add');
    }

    public function store(Request $request)
    {   
        Package::create($request->all());

        $notification = array(
			'message' => 'Package Created Successfully',
			'alert-type' => 'info'
		);

        return redirect()->route('packages.all')->with($notification);
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('backend.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package  = Package::where('id', $id)->first();
        $package->update($request->all()); 

        $notification = array(
			'message' => 'Package Update Successfully',
			'alert-type' => 'info'
		);

        return redirect()->route('packages.all')->with($notification);
    }

    public function delete($id)
    {
        Package::findOrFail($id)->delete();

        $notification = [
            'message' => 'Package Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
