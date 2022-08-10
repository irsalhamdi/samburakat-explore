<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageTransportation;
use App\Models\Transportation;
use Illuminate\Http\Request;

class TransportationPackageController extends Controller
{
    public function index()
    {
        $transportationpackages = PackageTransportation::with('transportation', 'package')->latest()->get();
        return view('backend.transportation-package.index', compact('transportationpackages'));
    }

    public function create()
    {
        $transportations = Transportation::orderBy('name', 'ASC')->get();
        $packages = Package::orderBy('name', 'ASC')->get();
        return view('backend.transportation-package.add', compact('transportations', 'packages'));
    }

    public function store(Request $request)
    {
        PackageTransportation::create($request->all());
        $notification = [
            'message' => 'Package Transportation Created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('transportation-package.all')->with($notification);
    }

    public function edit($id)
    {
        $transportationpackage = PackageTransportation::findOrFail($id)->get();
        $transportations = Transportation::orderBy('name', 'ASC')->get();
        $packages = Package::orderBy('name', 'ASC');
        return view('backend.transportation-package.edit', compact('transportations', 'packages', 'transportationpackage'));
    }

    public function update(Request $request, $id)
    {
        PackageTransportation::findOrFail($id)->update([
            'transportation_id' => $request->transportation_id,
            'package_id' => $request->package_id,
        ]);
        $notification = [
            'message' => 'Package Transportation Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('transportation-package.all')->with($notification);
    }

    public function destroy($id)
    {
        PackageTransportation::findOrFail($id)->delete();
        $notification = [
            'message' => 'Package Transportation Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
