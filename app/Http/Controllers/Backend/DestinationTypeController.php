<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\DestinationType;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DestinationTypeController extends Controller
{
    public function index()
    {
        $destinationtypes = DestinationType::latest()->get();
        return view('backend.destination-type.index', compact('destinationtypes'));
    }

    public function create()
    {
        return view('backend.destination-type.add');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/destination-type/' . $name);
        $url = 'upload/destination-type/' . $name;

        DestinationType::insert([
            'name' => $request->name,
            'image' => $url,
        ]);

        $notification = [
            'message' => 'Destination Type Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination-type.all')->with($notification);
    }

    public function edit($id)
    {
        $destinationtype = DestinationType::find($id);
        return view('backend.destination-type.edit', compact('destinationtype'));
    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/destination-type/' . $name);
            $url = 'upload/destination-type/' . $name;

            DestinationType::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $url,
            ]);

             $notification = [
                'message' => 'Destination Type Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('destination-type.all')->with($notification);            

        }else{

            DestinationType::findOrFail($id)->update([
                'name' => $request->name,
            ]);

            $notification = [
                'message' => 'Destination Type Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('destination-type.all')->with($notification);
        }
    }

    public function destroy($id)
    {
    	$data = DestinationType::findOrFail($id);
    	$img = $data->image;
    	unlink($img);
    	DestinationType::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Destination Type Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    
    }
}
