<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;

class StateController extends Controller
{
    // state List
    public function stateList(Request $request)
    {

        try {
            $state_list = state::where('country_id', $request->country_id)->get();
            return response($state_list);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
