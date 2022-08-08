<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Mail\Transport\Transport;

class TransportationController extends Controller
{
    public function index(){
        $transportations = Transportation::with('owner')->get();
        return view('backend.transportation.index', compact('transportations'));
    }

    public function create(){
        $owners = Owner::all();
        return view('backend.transportation.add', compact('owners'));
    }

    public function store(Request $request){
        Transportation::create($request->all());

        $notification = array(
			'message' => 'Transportation Created Successfully',
			'alert-type' => 'info'
		);

        return redirect()->route('transportation.all')->with($notification);
    }

    public function edit($id){
        $transportation = Transportation::findOrFail($id);
        $owners = Owner::all();
        return view('backend.transportation.edit', compact('transportation', 'owners'));
    }

    public function update(Request $request, $id){
        $transportation  = Transportation::where('id', $id)->first();
        $transportation->update($request->all()); 

        $notification = [
            'message' => 'TransportationS Updated Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('transportation.all')->with($notification);
    }

    public function destroy($id){
        Transportation::findOrFail($id)->delete();

        $notification = [
            'message' => 'Transportation Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
