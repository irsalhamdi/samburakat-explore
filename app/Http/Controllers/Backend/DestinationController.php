<?php

namespace App\Http\Controllers\Backend;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\DestinationType;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('destinationtype', 'village')->latest()->get();
        return view('backend.destination.index', compact('destinations'));
    }

    public function create(){
        $villages = Village::where('district_id', '6405070')->get();
        $destinationtypes = DestinationType::latest()->get();
        return view('backend.destination.add', compact('villages', 'destinationtypes'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/destination/' . $name);
        $url = 'upload/destination/' . $name;

        Destination::insert([
            'destination_type_id' => $request->destination_type_id,
            'village_id' => $request->village_id,
            'name' => $request->name,
            'image' => $url,
            'description' => $request->description,
            'guide' => $request->guide,
            'price' => $request->description,
        ]);

        $notification = [
            'message' => 'Destination Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination.all')->with($notification);
    }

    public function edit($id)
    {
        $destinationtypes = DestinationType::latest()->get();
        $data = Destination::findOrFail($id);
        $villages = Village::where('district_id', '6405070')->get();
        return view('backend.destination.edit', compact('villages', 'destinationtypes', 'data'));
    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/destination/' . $name);
            $url = 'upload/destination/' . $name;

            Destination::findOrFail($id)->update([
                'destination_type_id' => $request->destination_type_id,
                'village_id' => $request->village_id,
                'name' => $request->name,
                'image' => $url,
                'description' => $request->description,
                'guide' => $request->guide,
                'price' => $request->price,
            ]);

             $notification = [
                'message' => 'Destination Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('destination.all')->with($notification);            

        }else{

            Destination::findOrFail($id)->update([
                'destination_type_id' => $request->destination_type_id,
                'village_id' => $request->village_id,
                'name' => $request->name,
                'description' => $request->description,
                'guide' => $request->guide,
                'price' => $request->price,
            ]);

            $notification = [
                'message' => 'Destination Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('destination.all')->with($notification);
        }
    }

    public function destroy($id)
    {
        $data = Destination::findOrFail($id);
    	$img = $data->image;
    	unlink($img);
    	Destination::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Destination Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}

