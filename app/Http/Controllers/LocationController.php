<?php

namespace App\Http\Controllers;

use App\Models\Subcounty;
use App\Models\Ward;
use App\Models\Area;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getSubcounties(Request $request)
    {
        $countyId = $request->input('county_id');
        $subcounties = Subcounty::where('county_id', $countyId)->get();

        return view('partials.subcounty_options', compact('subcounties'));
    }

    public function getWards(Request $request)
    {
        $subcountyId = $request->input('subcounty_id');
        $wards = Ward::where('subcounty_id', $subcountyId)->get();

        return view('partials.ward_options', compact('wards'));
    }

    public function getAreas(Request $request)
    {
        $wardId = $request->input('ward_id');
        $areas = Area::where('ward_id', $wardId)->get();

        return view('partials.area_options', compact('areas'));
    }
}
