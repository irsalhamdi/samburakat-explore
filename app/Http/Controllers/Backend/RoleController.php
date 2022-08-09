<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class RoleController extends Controller
{
    public function admin(){
        $admins = Admin::where('type', 2)->latest()->get();
        return view('backend.role.role-admin', compact('admins'));
    }

    public function create(){
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();
        return view('backend.role.add', compact('villages'));
    }

    public function store(Request $request){
    	$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin-profile/'.$name_gen);
    	$save_url = 'upload/admin-profile/'.$name_gen;

	    Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'village_id' => $request->village_id,
            'role' => $request->role,
            'destination' => $request->destination,
            'owner' => $request->owner,
            'transportation' => $request->transportation,
            'hotel' => $request->hotel,
            'packages' => $request->packages,
            'booking' => $request->booking,
            'testimoni' => $request->testimoni,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),
    	]);

	    $notification = array(
			'message' => 'Admin Created Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('role.admin.all')->with($notification);
    }

    public function edit($id){
        $admin = Admin::findOrFail($id);
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();
        return view('backend.role.edit', compact('admin', 'villages'));
    }

    public function update(Request $request, $id){
    	$old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin-profile/'.$name_gen);
            $save_url = 'upload/admin-profile/'.$name_gen;
            
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'village_id' => $request->village_id,
                'role' => $request->role,
                'destination' => $request->destination,
                'transportation' => $request->transportation,
                'hotel' => $request->hotel,
                'packages' => $request->packages,
                'booking' => $request->booking,
                'testimoni' => $request->testimoni,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Admin Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('role.admin.all')->with($notification);
        }else{
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'village_id' => $request->village_id,
                'role' => $request->role,
                'destination' => $request->destination,
                'transportation' => $request->transportation,
                'packages' => $request->packages,
                'booking' => $request->booking,
                'type' => 2,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Admin Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('role.admin.all')->with($notification);
        }
    }

    public function destroy($id){
        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Admin Deleted Successfully',
           'alert-type' => 'info'
        );

       return redirect()->back()->with($notification);
    }

    public function users(){
        $users = User::latest()->get();
        return view('backend.role.role-users', compact('users'));
    }
}
