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
        $owners = Owner::with('village')->orderBy('name', 'ASC')->get();
        return view('backend.owner.index', compact('owners'));
    }

    public function create(){
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();
        return view('backend.owner.add', compact('villages'));
    }

    public function store(Request $request){
        Owner::create([
            'village_id' => $request->village_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'type' => $request->type
        ]);

        $notification = [
            'message' => 'Owner Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('owner.all')->with($notification);
    }

    public function edit($id){
        $owner = Owner::findOrFail($id);
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();

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

