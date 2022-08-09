<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hotel;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('backend.packages.index', compact('packages'));
    }

    public function create()
    {
        $hotels = Hotel::orderBy('name', 'ASC')->get();
        return view('backend.packages.add', compact('hotels'));
    }

    public function store(Request $request)
    {      

        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/package/' . $name);
        $url = 'upload/package/' . $name;

        Package::insert([
            'name' => $request->name,
            'thumbnail' => $url,
            'description' => $request->description,
            'day' => $request->day,
            'night' => $request->night,
            'price' => $request->price,
            'hotel_id' => $request->hotel_id,
        ]);

        $notification = [
            'message' => 'Package Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination.all')->with($notification);

        $notification = array(
			'message' => 'Package Created Successfully',
			'alert-type' => 'info'
		);

        return redirect()->route('packages.all')->with($notification);
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $hotels = Hotel::orderBy('name', 'ASC')->get();
        return view('backend.packages.edit', compact('package', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        $old_image = $request->old_image;
        
        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/package/' . $name);
            $url = 'upload/package/' . $name;

            Package::findOrFail($id)->update([
                'name' => $request->name,
                'thumbnail' => $url,
                'description' => $request->description,
                'day' => $request->day,
                'night' => $request->night,
                'price' => $request->price,
                'hotel_id' => $request->hotel_id,
            ]);

            $notification = [
                'message' => 'Package Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('packages.all')->with($notification);            

        }else{

            Package::findOrFail($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'day' => $request->day,
                'night' => $request->night,
                'price' => $request->price,
                'hotel_id' => $request->hotel_id,
            ]);

            $notification = [
                'message' => 'Package Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('packages.all')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Package::findOrFail($id);
    	$img = $data->thumbnail;
    	unlink($img);
    	Package::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Package Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    
    }
}


