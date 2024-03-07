<?php

namespace App\Http\Controllers;

use App\Mail\ActivationEmail;
use App\Mail\activationmail;
use App\Mail\DeactivationEmail;
use App\Models\Item;
use App\Models\Appointment;
use App\Models\ServiceCategory;
use App\Models\Room;
use App\Models\User;
use App\Models\Role;
use App\Models\Doctor;
use App\Notifications\FeedbackNotification;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use TCPDF;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $serviceCategories = ServiceCategory::all();
        return view('user.dashboard',compact('serviceCategories'));      
    }

    public function index()
    {
        $serviceCategories = ServiceCategory::all();
        return view('service_categories.index', compact('serviceCategories'));
    }

    public function show($id, Request $request)
    {
        $category = ServiceCategory::find($id);
        $counties = County::all(); // Fetch all counties from the database or from wherever you get the data
        $subcounties =Subcounty::all(); // Fetch all counties from the database or from wherever you get the data
        $wards = Ward::all(); // Fetch all counties from the database or from wherever you get the data
        $areas = Area::all(); // Fetch all counties from the database or from wherever you get the data



        $selectedCounty = $category->county_id; // Assuming you have a county_id in your ServiceCategory model
        $selectedSubcounty = $category->subcounty_id; // Replace this with your actual logic to determine the selected subcounty
        $selectedWard = $category->ward_id; // Replace this with your actual logic to determine the selected ward
        $selectedArea = $category->area_id; // Replace this with your actual logic to determine the selected area
        // Other necessary logic...
        $searchResults = ServiceProvider::where('service_id', $request->input('service_id'))
        ->where('county_id', $request->input('county_id'))
        ->where('subcounty_id', $request->input('subcounty_id'))
        ->where('ward_id', $request->input('ward_id'))
        ->where('area_id', $request->input('area_id'))
        ->get();

         foreach ($searchResults as $result) {
        // Fetch the user's name based on the user_id
        $user = User::find($result->user_id);
        $result->service_provider_name = $user->name;

        // Fetch the service name based on the service_id
        $service = Service::find($result->service_id);
        $result->service_name = $service->name;
    }
    
        return view('service_categories.show', compact('category', 'selectedCounty','counties','subcounties','selectedSubcounty','wards','selectedWard','areas','selectedArea','searchResults'));
    }

    public function getSubcountiesByCounty(Request $request)
{
    $countyId = $request->input('county_id');
    $subcounties = Subcounty::where('county_id', $countyId)->get();

    return response()->json($subcounties);
}
public function getWardsBySubcounty(Request $request)
{
    $subcountyId = $request->input('subcounty_id');
    $wards = Ward::where('subcounty_id', $subcountyId)->get();

    return response()->json($wards);
}

public function getAreasByWard(Request $request)
{
    $wardId = $request->input('ward_id');
    $areas = Area::where('ward_id', $wardId)->get();

    return response()->json($areas);
}


public function searchServiceProviders(Request $request)
{
    $serviceId = $request->input('service_id');
    $countyId = $request->input('county_id');
    $subcountyId = $request->input('subcounty_id');
    $wardId = $request->input('ward_id');
    $areaId = $request->input('area_id');

    // Query service providers based on the selected criteria
    $serviceProviders = ServiceProvider::with(['service', 'user']) // Load relationships
        ->where('service_id', $serviceId)
        ->where('county_id', $countyId)
        ->where('subcounty_id', $subcountyId)
        ->where('ward_id', $wardId)
        ->where('area_id', $areaId)
        ->get();

    // Transform the data to the format expected by the JavaScript code
    $formattedProviders = $serviceProviders->map(function ($provider) {
        $profilePicPath = $provider->profile_pic ? asset('public/assets/img/illustrations/' . $provider->profile_pic) : '';
        
        return [
            'profile_pic' => $profilePicPath,
            'service_provider_name' => $provider->user->name ?? '', // Check if name exists
            'service_name' => $provider->service->name ?? '', // Check if service name exists
        ];
    });

    // Return the formatted data
    return response()->json($formattedProviders);
}

}
    