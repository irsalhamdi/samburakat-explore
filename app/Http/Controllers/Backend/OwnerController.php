<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(){
        $owners = Owner::with('village')->get();
        $villages = Village::where('district_id', '6405070')->get();
        return view('backend.owner.index', compact('owners', 'villages'));
    }

    public function store(Request $request){
        Owner::create($request->all());

        $notification = [
            'message' => 'Owner Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $owner = Owner::findOrFail($id);
        $villages = Village::where('district_id', '6405070')->get();

        return view('backend.owner.edit', compact('owner', 'villages'));
    }

    public function update(Request $request, $id){
        $owner  = Owner::where('id', $id)->first();
        $owner->update($request->all()); 

        $notification = [
            'message' => 'Owner Updated Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('owner.all')->with($notification);
    }

    public function destroy($id){
        Owner::findOrFail($id)->delete();

        $notification = [
            'message' => 'Owner Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

