<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hotel;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryHotel;
use Intervention\Image\Facades\Image;

class HotelController extends Controller
{
    public function index()
    {   
        $hotels = Hotel::with('owner')->orderBy('name', 'ASC')->get();
        return view('backend.hotel.index', compact('hotels'));
    }

    public function create()
    {
        $owners = Owner::orderBy('name', 'ASC')
            ->where('type', '2')->orWhere('type', '3')->get();
        return view('backend.hotel.add', compact('owners'));
    }

    public function store(Request $request)
    {
        $hotel_id = Hotel::insertGetId([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
        ]);

        $images = $request->file('image');

        foreach($images  as $image){

            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/hotel/' . $name);
            $url = 'upload/hotel/' . $name;

            GalleryHotel::insert([
                'hotel_id' => $hotel_id,
                'image' => $url,
            ]);
        }

        $notification = [
            'message' => 'Hotel Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('hotel.all')->with($notification);
    }

    public function edit($id)
    {   
        $hotel = Hotel::findOrFail($id);
        $owners = Owner::orderBy('name', 'ASC')
            ->where('type', '1')->orWhere('type', '3')->get();
        $galleries = GalleryHotel::where('hotel_id', $id)->get();
        return view('backend.hotel.edit', compact('hotel', 'owners', 'galleries'));
    }

    public function updateGallery(Request $request){

        $images = $request->multi_img;

		foreach ($images as $id => $img) {
            $imgDel = GalleryHotel::findOrFail($id);
            unlink($imgDel->image);

            $name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/hotel/'.$name);
            $url = 'upload/hotel/'.$name;

            GalleryHotel::where('id',$id)->update([
                'image' => $url,
            ]);
        }

        $notification = [
            'message' => 'Hotel Gallery Updated Succesfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('hotel.all')->with($notification);

    }

    public function deleteGallery($id){
        $oldimg = GalleryHotel::findOrFail($id);
        unlink($oldimg->image);
        GalleryHotel::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Gallery Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        $images = GalleryHotel::where('hotel_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->image);
            GalleryHotel::where('hotel_id',$id)->delete();
        }

        $hotel->delete();

        $notification = array(
           'message' => 'Hotel Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
