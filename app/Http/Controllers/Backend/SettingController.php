<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seo;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index(){

        $setting = Setting::find(1);
        return view('backend.settings.index', compact('setting'));
    }

    public function update(Request $request){

        $setting_id = $request->id;

        if ($request->file('logo')) {

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
            $save_url = 'upload/logo/'.$name_gen;

            Setting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'address' => $request->company_address,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'logo' => $save_url,
            ]);

            $notification = [
                'message' => 'Settings Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        }else{

            Setting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'address' => $request->company_address,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);

            $notification = [
                'message' => 'Settings Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function seo(){

    	$seo = Seo::find(1);
    	return view('backend.settings.seo', compact('seo'));
    }

    public function SeoUpdate(Request $request){

    	$seo_id = $request->id;

    	Seo::findOrFail($seo_id)->update([
		    'meta_title' => $request->meta_title,
		    'meta_author' => $request->meta_author,
		    'meta_keyword' => $request->meta_keyword,
	    	'meta_description' => $request->meta_description,
    		'google_analytics' => $request->google_analytics,		 
    	]);
        
        $notification = [
            'message' => 'Settings Updated Successfully',
            'alert-type' => 'success'
        ];

		return redirect()->back()->with($notification);
    } 
}
