<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;

class CityController extends Controller
{

    // City List
    public function cityList(Request $request)
    {

        try {
            $city_list = city::where('state_id', $request->state_id)->get();
            return response($city_list);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
