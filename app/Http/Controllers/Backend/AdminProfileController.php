<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $admin = Admin::find($id);
        return view('admin.profile', compact('admin'));
    }

    public function edit(){
        $id = Auth::user()->id;
        $admin = Admin::find($id);
        $villages = Village::where('district_id', '6405070')->orderBy('name', 'ASC')->get();
        return view('admin.profile-edit', compact('admin', 'villages'));
    }

    public function update(Request $request){
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->village_id = $request->village_id;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin-profile/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin-profile'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword(){
        $id = Auth::user()->id;
        $admin = Admin::find($id);
        return view('admin.change-password', compact('admin'));
    }

    public function updatePassword(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashed = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashed)) {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
