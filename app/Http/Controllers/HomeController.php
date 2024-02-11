<?php

namespace App\Http\Controllers;
use App\Models\ServiceCategory;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::all();
        return view('welcome',compact('serviceCategories'));
    }
}
