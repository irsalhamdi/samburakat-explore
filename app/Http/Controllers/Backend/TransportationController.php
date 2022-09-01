<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Mail\Transport\Transport;

class TransportationController extends Controller
{
    public function index(){
        $transportations = Transportation::with('owner')->get();
        return view('backend.transportation.index', compact('transportations'));
    }

    public function create(){
        $owners = Owner::orderBy('name', 'ASC')
            ->where('type', '1')->orWhere('type', '3')->get();
        return view('backend.transportation.add', compact('owners'));
    }

    public function store(Request $request){
        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/transportation/' . $name);
        $url = 'upload/transportation/' . $name;

        Transportation::insert([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'image' => $url,
        ]);

        $notification = [
            'message' => 'Transportation Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('transportation.all')->with($notification);
    }

    public function edit($id){
        $transportation = Transportation::findOrFail($id);
        $owners = Owner::all();
        return view('backend.transportation.edit', compact('transportation', 'owners'));
    }

    public function update(Request $request, $id){
        $id = $request->id;
        $old_image = $request->old_image;
        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/transportation/' . $name);
            $url = 'upload/transportation/' . $name;

            Transportation::findOrFail($id)->update([
                'owner_id' => $request->owner_id,
                'name' => $request->name,
                'image' => $url,
            ]);

            $notification = [
                'message' => 'Transportation Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('transportation.all')->with($notification);            

        }else{

            Transportation::findOrFail($id)->update([
                'owner_id' => $request->owner_id,
                'name' => $request->name,
            ]);

            $notification = [
                'message' => 'Transportation Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('transportation.all')->with($notification);
        }
    }

    public function destroy($id){
    	$data = Transportation::findOrFail($id);
    	$img = $data->image;
    	unlink($img);
    	Transportation::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Transportation Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
