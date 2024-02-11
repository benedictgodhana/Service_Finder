<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\County;
use App\Models\Subcounty;
use App\Models\Ward;
use App\Models\Area;
use App\Models\ServiceProvider;



use App\Models\ServiceCategory;
use App\Models\Service;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Notifications\UserRegisteredNotification;
use App\Notifications\UserLoggedInNotification; // Import the notification class

// ...

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

       
    }
    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if (Auth::user() && Auth::user()->role == 1) {
            $redirect = '/super-admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 2) {
            $redirect = '/sub-admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 3) {
            $redirect = '/admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 4) {
            $redirect = '/miniadmin/dashboard';
        } else {
            $redirect = '/dashboard';
        }

        return $redirect;
    }

    public function logout(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Log the logout activity
        Activity::create([
            'user_id' => $user->id,
            'action' => 'User Logged Out',
            'description' => 'User ' . $user->name . ' logged out',
        ]);

        $request->session()->flush();
        Auth::logout();

        return redirect('/');
    }
    public function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $userCredential = $request->only('email', 'password');
    
        // Attempt to authenticate the user
        if (Auth::attempt($userCredential)) {
            $user = Auth::user();
    
            // Redirect to the password reset page if it's the user's first login or password is 'Kenya@2030'
            if (Hash::check('Kenya@2030', $user->password)) {
                return response()->json(['success' => true, 'redirectTo' => route('custom-reset'), 'resetPassword' => true]);
            } else {
                // Redirect to the regular dashboard
                Auth::login($user); // Log the user in before redirecting
                $dashboardRoute = $this->redirectDash();
                return response()->json(['success' => true, 'redirectTo' => $dashboardRoute]);
            }
        } else {
            // Authentication failed
            return response()->json(['success' => false, 'message' => 'Incorrect email or password']);
        }
    }
    

    
    public function loadLogin()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }

        // Store the previous URL in the session
        Session::put('previous_url', url()->previous());

        $user = Auth::user(); // Retrieve the authenticated user
                return view('login',compact('user'));
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            // Get the user data from Google
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists in your database
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // If the user doesn't exist, create a new user
                $user = new User();
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                // You can set other user attributes here as needed
                $user->save();
            }

            // Log in the user
            Auth::login($user);

            Activity::create([
                'user_id' => $user->id,
                'action' => 'User Logged In',
                'description' => 'User ' . $user->name . ' logged in using Google',
            ]);

            // Send a notification to the user
            $user->notify(new UserLoggedInNotification());

            // Redirect the user to the previous URL or the dashboard
            $previousUrl = Session::get('previous_url', '/dashboard');
            Session::forget('previous_url'); // Clear the stored URL
            return redirect($previousUrl);
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during the login process
            return redirect('/login')->with('error', 'Google login failed.');
        }
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        // Check if the user is authenticated and activated
        if ($user && $user->activated) {
            // Add logic to handle password change and logout
            // Once the password is changed, log the user out and redirect to login
            if ($request->isMethod('post')) {
                // Validate and update the password
                $request->validate([
                    'new_password' => 'required|min:8',
                ]);

                $user->password = Hash::make($request->input('new_password'));
                $user->save();

                Auth::logout();
                Alert::success('Success', 'Password changed successfully. Please log in with your new password.');
                return redirect()->route('login'); // Change to the appropriate route name
            }

            // Render the password change form
            return view('change_password');
        } else {
            // User is not authenticated or not activated
            Alert::error('Error', 'Invalid request.');
            return redirect()->route('login'); // Change to the appropriate route name
        }
    }
    public function activateAccount(Request $request, User $user)
    {
        // Check if the provided activation token is valid
        if ($request->has('token') && $request->token === $user->activation_token) {
            // Mark the user as activated
            $user->activated = true;
            $user->save();

            // Log the user in and prompt them to change their password
            Auth::login($user);
            return redirect()->route('change-password'); // Change to the appropriate route name
        } else {
            Alert::error('Error', 'Invalid activation token.');
            return back();
        }
    }

    public function ShowActivationpage(){
        return view('activate');
    }

    // AuthController.php

public function loadRegister()
{


    $serviceCategories  = ServiceCategory::all();
    $counties = County::all(); // Fetch all counties from the database or from wherever you get the data
    $subcounties =Subcounty::all(); // Fetch all counties from the database or from wherever you get the data
    $wards = Ward::all(); // Fetch all counties from the database or from wherever you get the data
    $areas = Area::all(); // Fetch all counties from the database or from wherever you get the data


    return view('register',compact('serviceCategories','counties','subcounties','wards','areas'));
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
public function getServices($categoryId)
{
    // Retrieve services based on the provided category ID
    $services = Service::where('category_id', $categoryId)->get();

    // Return services as JSON response
    return response()->json($services);
}
public function store(Request $request)
{
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:8',
            
            
            
        ]);

        // Debug to check the form data

        // Continue with your code to process the form data
        // Create a new user instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $userId = $user->id;


        // Create a new ServiceProvider instance
        $serviceProvider = new ServiceProvider();
        $serviceProvider->user_id = $userId; // Assign the user_id
        $serviceProvider->county_id = $request->input('county_id');
        $serviceProvider->subcounty_id = $request->input('subcounty_id');
        $serviceProvider->ward_id = $request->input('ward_id');
        $serviceProvider->area_id = $request->input('area_id');
        $serviceProvider->contact_information = $request->input('contact_information');
        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $serviceProvider->profile_pic = $profilePicPath;
        }
        $serviceProvider->gender = $request->input('gender');
        $serviceProvider->qualifications = $request->input('qualifications');
        $serviceProvider->business_name = $request->input('business_name');
        $serviceProvider->business_description = $request->input('business_description');
        $serviceProvider->website = $request->input('website');
        $serviceProvider->service_category_id = $request->input('service_category_id');
        $serviceProvider->service_id = $request->input('service_id');
        $serviceProvider->save();

        return redirect()->back()->with('success', 'Service provider created successfully.');
        // Redirect or return response
   
}

}