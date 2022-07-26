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
use App\Models\Gallery;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('destinationtype', 'village')->latest()->get();
        return view('backend.destination.index', compact('destinations'));
    }

    public function create(){
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();
        $destinationtypes = DestinationType::latest()->get();
        return view('backend.destination.add', compact('villages', 'destinationtypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $image = $request->file('thumbnail');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/destination/image/' . $name);
        $url = 'upload/destination/image/' . $name;
        
        $destination_id = Destination::insertGetId([
            'destination_type_id' => $request->destination_type_id,
            'village_id' => $request->village_id,
             'name' => $request->name,
             'image' => $url,
             'description' => $request->description,
             'guide' => $request->guide,
             'price' => $request->price, 
             'location' => $request->location
        ]);

        $images = $request->file('image');

        foreach($images  as $image){

            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/destination/galleries/' . $name);
            $url = 'upload/destination/galleries/' . $name;

            Gallery::insert([
                'destination_id' => $destination_id,
                'image' => $url,
            ]);
        }

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
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();
        $galleries = Gallery::where('destination_id', $id)->get();
        return view('backend.destination.edit', compact('villages', 'destinationtypes', 'data', 'galleries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

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
                'location' => $request->location,
            ]);

            $notification = [
                'message' => 'Destination Updated Succesfully',
                'alert-type' => 'info'
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
                'location' => $request->location,
            ]);

            $notification = [
                'message' => 'Destination Updated Succesfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('destination.all')->with($notification);
        }
    }

    public function updateImage(Request $request)
    {
        $destination_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);
   
       $image = $request->file('image');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(917,1000)->save('upload/destination/image/'.$name_gen);
           $save_url = 'upload/destination/image/'.$name_gen;
   
           Destination::findOrFail($destination_id)->update([
               'image' => $save_url,
   
           ]);
   
            $notification = array(
               'message' => 'Destination Image Updated Successfully',
               'alert-type' => 'info'
           );
   
           return redirect()->back()->with($notification);
    }

    public function updateGallery(Request $request){

        $images = $request->multi_img;

		foreach ($images as $id => $img) {
            $imgDel = Gallery::findOrFail($id);
            unlink($imgDel->image);

            $name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/destination/galleries/'.$name);
            $url = 'upload/destination/galleries/'.$name;

            Gallery::where('id',$id)->update([
                'image' => $url,
            ]);
        }

        $notification = [
            'message' => 'Destination Gallery Updated Succesfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

    public function deleteGallery($id){
        $oldimg = Gallery::findOrFail($id);
        unlink($oldimg->image);
        Gallery::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Gallery Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        unlink($destination->image);
        Destination::findOrFail($id)->delete();

        $images = Gallery::where('destination_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->image);
            Gallery::where('destination_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Destination Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}

