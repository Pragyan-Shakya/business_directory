<?php

namespace App\Http\Controllers;

use App\Model\District;
use App\Model\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistrict(Request $request){
        $province = Province::find($request->province_id);
        $districts = $province->districts;
        return response()->json(['data' => $districts], 200);
    }

    public function getMunicipal(Request $request){
        $district = District::find($request->district_id);
        $municipals = $district->municipals;
        return response()->json(['data' => $municipals], 200);
    }
}
