<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::latest()->get();
        return view('backend.testimoni.index', compact('testimonies'));
    }

    public function active($id)
    {
        Testimony::findOrFail($id)->update([
            'status' => '0'
        ]);
        $notification = array(
            'message' => 'Status Testimoni Update Successfully',
            'alert-type' => 'info'
        );
 
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {   
        Testimony::findOrFail($id)->update([
            'status' => '1'
        ]);
        $notification = array(
            'message' => 'Status Testimoni Update Successfully',
            'alert-type' => 'info'
        );
 
        return redirect()->back()->with($notification);
    }
}
