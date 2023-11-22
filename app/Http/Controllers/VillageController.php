<?php

namespace App\Http\Controllers;

use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VillageController extends Controller
{
    // Village list
    public function villageList(Request $request)
    {
        try {
            $village_list = village::get();
            return response($village_list);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Add Village
    public function addVillage(Request $request)
    {
        try {
            DB::table('villages')->insert([
                'village_name' => $request->village_name,
                'city_id' => 1
            ]);
        } catch (\Exception $e) {
        }
    }
}
