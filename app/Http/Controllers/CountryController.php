<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // get country list
    public function countryList(Request $request)
    {
        try {
            $countries = country::get();
            return response($countries);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
