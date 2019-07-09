<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show(Request $request, City $city)
    {
        $city->load(['talathi']);
        $aathBs = $city->aathBs()->paginate(5);
//$aathBs = null;
        return view('city.show', compact('city', 'aathBs'));
    }
}
