<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    // City List
    public function cityList(Request $request)
    {

        try {
            $city_list = city::get();
            return response($city_list);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Add Village
    public function addCity(Request $request)
    {
        try {
            DB::table('cities')->insert([
                'city_name' => $request->city_name,
                'state_id' => 1
            ]);
        } catch (\Exception $e) {
        }
    }
}
