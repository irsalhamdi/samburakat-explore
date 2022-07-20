<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(){
        $admin = Admin::find(1);
        return view('admin.profile', compact('admin'));
    }

    public function edit(){
        $admin = Admin::find(1);
        return view('admin.profile-edit', compact('admin'));
    }

    public function update(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

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
        $admin = Admin::find(1);
        return view('admin.change-password', compact('admin'));
    }

    public function updatePassword(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashed = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashed)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
