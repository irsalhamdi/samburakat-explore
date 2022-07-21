<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function GetRegency($province_id){
        
        $regency = Regency::where('province_id', $province_id)->orderBy('name', 'ASC')->get();
        return json_encode($regency);
    }

    public function GetDisctrict($regency_id){

        $district = District::where('regency_id', $regency_id)->orderBy('name', 'ASC')->get();
        return json_encode($district);
    }

    public function GetVillage($district_id){

        $village = Village::where('district_id', $district_id)->orderBy('name', 'ASC')->get();
        return json_encode($village);
    }
}
