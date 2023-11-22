<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StateController extends Controller
{
    // state List
    public function stateList(Request $request)
    {

        try {
            $state_list = state::get();
            return response($state_list);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Add State
    public function addState(Request $request){
        try {
            DB::table('states')->insert([
                'state_name' => $request->state_name,
                'country_id' => 1
            ]);
            
        } catch (\Exception $e) {
        }
    }
}
