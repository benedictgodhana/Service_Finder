<?php

namespace App\Http\Controllers;

use App\Mail\ActivationEmail;
use App\Models\Activity;
use App\Models\Department;
use App\Notifications\UserReservationNotification;
use TCPDF;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Customer;
use App\Models\Role;
use App\Models\Room;
use App\Models\Ward;
use App\Models\Area;
use App\Models\ServiceProvider;
use App\Models\County;
use App\Models\Subcounty;
use App\Models\Appointment;
use App\Notifications\BookingAcceptedNotification;
use App\Notifications\BookingDeclinedNotification;
use App\Rules\RoomAvailability;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon; // Import the Carbon library
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Iterator;

class SuperAdminController extends Controller
{
   
    public function getSubcounties(Request $request)
    {
        $countyId = $request->input('county_id');
        $subcounties = Subcounty::where('county_id', $countyId)->get();

        return view('partials.subcounty_options', compact('subcounties'));
    }

    //
        public function dashboard()
    {
        $patientCount = User::where('role', '0')->count();
        $doctorCount = User::where('role', '2')->count();
        $countyCount = County::count();
        $subcountyCount = Subcounty::count();
        $wardCount = Ward::count();
        $AreaCount = Area::count();
        $activities = Activity::orderBy('created_at', 'desc')->paginate(7);    
        return view('super-admin.dashboard', compact('patientCount', 'doctorCount','activities','countyCount','subcountyCount','wardCount','AreaCount'));
    }
    public function counties(){
        $counties=County::All();
        return view('super-admin.counties', compact('counties'));
    }
    public function subcounties(){
        $subcounties=Subcounty::All();
        return view('super-admin.subcounties', compact('subcounties'));
    }
    public function wards(){
        return view('super-admin.wards');
    }
    public function areas(){
        return view('super-admin.areas');
    }

    public function users()
    {
        $patients=Customer::all();
        $counties=County::all();
        $subcounties=Subcounty::all();
        $wards=Ward::all();
        $areas=Area::all();

        // Assuming role_id 1 corresponds to the 'doctor' role
        $role = Role::where('id', 0)->where('name', 'Customer')->first();
    
        if (!$role) {
            // Handle the case where the role with id 1 and name 'doctor' is not found
            abort(404, 'Role not found');
        }
    
        // Retrieve users associated with the role
        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->paginate(7);
        return view('super-admin.users', compact('users', 'role','patients','counties','subcounties','wards','areas'));
    }

    public function doctors()
    {

        $doctors=ServiceProvider::all();
        $role = Role::where('id', 2)->where('name', 'ServiceProvider')->first();
    
        if (!$role) {
            abort(404, 'Role not found');
        }
    
        // Retrieve users associated with the role
        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->paginate(7);
    
        return view('super-admin.doctors', compact('users', 'role','doctors'));
    }
    

    public function storeDoctor(Request $request)
{

    $rules = [
        'name' => 'required|string|min:2',
        'dob' => 'required|date',
        'gender' => 'required|in:Male,Female',
        'contact_number' => 'nullable|string|max:20',
        'email' => 'required|email|unique:users,email', // Ensure email uniqueness in the users table
        'address' => 'nullable|string|max:255',
        'password' => 'required|string|min:6', // Add a validation rule for the password
        'identification_number' => 'required|string', // Add validation for identification_number
        'availability_schedule' => 'required|string', // Add validation for availability_schedule
        'appointment_preferences' => 'required|string', // Add validation for appointment_preferences
        'specialization' => 'required|string', // Add validation for specialization
        'qualification' => 'required|string', // Add validation for qualification
        'license_number' => 'required|string', // Add validation for license_number
        'bio' => 'nullable|string',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add other patient-specific validation rules as needed
    ];
    if ($request->hasFile('profile_picture')) {
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $validatedData['profile_picture'] = $path;
    }

    // Validate the request
    $request->validate($rules);

    // Create a new user (assuming the User model is used for patients)
    $user = User::create([
        'name' => $request->input('name'),
        'dob' => $request->input('dob'),
        'gender' => $request->input('gender'),
        'email' => $request->input('email'),
        'role' => $request->input('role'),
        'password' => Hash::make($request->input('password')),            
        // Add other user-specific fields as needed
    ]);
  

    // Create a new patient
    $doctor = Doctor::create([
        'user_id' => $user->id,
        'dob' => $request->input('dob'),
        'gender' => $request->input('gender'),
        'contact_number' => $request->input('contact_number'),
        'address' => $request->input('address'),
        'identification_number' => $request->input('identification_number'),
        'availability_schedule' => $request->input('availability_schedule'),
        'appointment_preferences' => $request->input('appointment_preferences'),
        'license_number' => $request->input('license_number'),
        'specialization' => $request->input('specialization'),
        'qualification' => $request->input('qualification'),
        'bio' => $request->input('bio'),
        'profile_picture' => $request->input('profile_picture'),




        // Add other patient-specific fields as needed
    ]);

return back()->with('success', 'User and patient information added successfully.');    
}


    public function manageRole()
    {
        $users = User::all();
        $roles = Role::all();
        return view('super-admin.manage-role', compact('users', 'roles'));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }
    public function reservation()
    {
        $pendingReservations = Appointment::where('status', 'Pending')
            ->orderBy('created_at', 'asc') // Order by the created_at column in ascending order
            ->paginate(10);
        $acceptedReservations = Appointment::where('status', 'Accepted')
            ->orderBy('created_at', 'asc') // Order by the created_at column in ascending order
            ->paginate(10);
        $reservations = Appointment::paginate(10);
        return view('super-admin.reservation', compact('reservations', 'acceptedReservations', 'pendingReservations'));
    }
    // SuperAdminController.php

    public function updateReservationStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Accepted,Declined',
            'remarks' => 'nullable|string|max:255',
        ]);

        $reservation = Appointment::findOrFail($id);

        $reservation->status = $validatedData['status'];
        $reservation->remarks = $validatedData['remarks'];


        $reservation->save();


        if ($request->status === 'Accepted') {
            // Notify the user that the booking has been accepted
            $reservation->user->notify(new BookingAcceptedNotification($reservation));
        } elseif ($request->status === 'Declined') {
            // Notify the user that the booking has been declined and include a remark
            $reservation->user->notify(new BookingDeclinedNotification($reservation, $request->remark));
        } elseif ($request->status === 'Cancelled') {
            // Notify the user that the booking has been canceled
            $reservation->user->notify(new BookingCanceledNotification($reservation, $request->remark));
        }
        

        // Display a success message using SweetAlert
        Alert::success('Success', 'Reservation status updated successfully!')->autoClose(60000);
        return redirect()->back();
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:0,1,2,3,4',
            'password' => 'nullable|string|min:6', // Password is optional
            'is_guest' => 'required|in:0,1',
            'department' => 'required|in:eHealth,IT Outsourcing & BITCU,Digital Learning,Data Science,IoT,IT Security,iBizAfrica,IR & EE,PR,IT Department,Others',
            'other_department' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]);

        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->is_guest = $request->input('is_guest'); // Update the user type

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->input('department') !== 'Others') {
            $user->department = $request->input('department');
        } else {
            // If 'Others' selected, use the value from the 'other_department' field
            $user->department = $request->input('other_department');
        }

        $user->contact = $request->input('contact');

        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'User information updated successfully.');
    }
    public function store(Request $request)
    {
         // Validation rules - adjust as needed
         $rules = [
            'name' => 'required|string|min:2',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email', // Ensure email uniqueness in the users table
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:6', // Add a validation rule for the password
            // Add other patient-specific validation rules as needed
        ];
    
        // Validate the request
        $request->validate($rules);
    
        // Create a new user (assuming the User model is used for patients)
        $user = User::create([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),            
            // Add other user-specific fields as needed
        ]);
      

        // Create a new patient
        $patient = Patient::create([
            'user_id' => $user->id,
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),
            // Add other patient-specific fields as needed
        ]);

    return back()->with('success', 'User and patient information added successfully.');
}

    public function createReservation(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'requestItems' => 'boolean',
            'itemRequests' => 'nullable|array', // Make the itemRequests field optional            
            'itemRequests.*' => 'exists:items,id', // Validate each item in the array           
            'duration' => 'required|integer',
            'capacity' => 'required|integer',
            'reservationDate' => 'required|date',
            'reservationTime' => 'required|date_format:H:i',
            'timelimit' => 'required|date_format:H:i',
            'selectRoom' => 'required|exists:rooms,id',
            'event' => 'nullable|string',

        ]);

       
        $isRoomAvailable = !DB::table('reservations')
            ->where('room_id', $validatedData['selectRoom'])
            ->where('reservationDate', $validatedData['reservationDate'])
            ->where('reservationTime', $validatedData['reservationTime'])
            ->exists();

        if (!$isRoomAvailable) {
            throw ValidationException::withMessages(['selectRoom' => 'This room is not available at the selected date and time.']);
        }
        

        // Create a new reservation instance and populate it with the form data
        $reservation = new Appointment();
        $reservation->user_id = $validatedData['user_id'];
        $reservation->reservationDate = $validatedData['reservationDate'];
        $reservation->reservationTime = $validatedData['reservationTime'];
        $reservation->timelimit = $validatedData['timelimit']; // Store the calculated end time
        $reservation->room_id = $validatedData['selectRoom'];
        $reservation->event = $validatedData['event'];

        $reservation->status = 'Accepted';

        // Save the reservation to the database
        $reservation->save();

        if ($request->has('itemRequests')) {
            $itemRequests = $request->input('itemRequests');
            // Now, you can work with $itemRequests
        }
        
    

        // Attach selected items (if any) to the reservation
        Session::flash('success', 'Reservation made successfully!');

        // Redirect back with a success message
        return redirect()->back();
    }

    public function showActivities()
    {
        $activities = Activity::simplepaginate(10); // Paginate the latest 10 activities        

        return view('super-admin.activities', ['activities' => $activities]);
    }
    public function showProfile()
    {
        return view('super-admin.profile');
    }
    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'nullable',
            'new_password' => 'nullable|min:8',
            'new_password_confirmation' => 'nullable|same:new_password',
            'contact' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

       // Check if the current password is provided and matches the authenticated user's password
if ($request->current_password && !Hash::check($request->current_password, Auth::user()->password)) {
    return redirect()->back()->with('error', 'Incorrect current password');
}

// Check if the new password is provided and is too obvious (e.g., contains "password" or "123456")
$obviousPasswords = ['password', '123456']; // Add more obvious passwords if needed
if ($request->new_password && in_array($request->new_password, $obviousPasswords)) {
    return redirect()->back()->with('error', 'Please choose a stronger password');
}

        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->department = $request->input('department') === 'Others'
        ? $request->input('other_department') // Use "other_department" if "Others" selected
        : $request->input('department'); // Use the selected department
        $user->contact = $request->input('contact');
        $user->save();

        return redirect()->back()->with('success', 'User Profile updated Successfully');
    }
    public function searchReservations(Request $request)
    {
        $searchQuery = $request->input('search');
        $status = $request->input('status');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $query = Reservation::query();
    
        if (!empty($status)) {
            $query->where('status', $status);
        }
    
        if (!empty($searchQuery)) {
            $query->where(function ($subquery) use ($searchQuery) {
                $subquery->whereHas('user', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');
                })
                ->orWhereHas('room', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');
                })
                ->orWhere('event', 'like', '%' . $searchQuery . '%');
            });
        }
    
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('ReservationDate', [$startDate, $endDate]);
        }
    
        $Results = $query->paginate(10);
    
        return view('super-admin.search-results', compact('Results'));
    }

    public function generatePDF(Request $request)
    {
        // Get the search and filter criteria from the request
        $search = $request->input('search');
        $filter = $request->input('filter');
    
        // Query the activities based on the filter and search criteria
        $query = Activity::query();
        
        if ($filter === 'action') {
            $query->where('action', 'like', '%' . $search . '%');
        } elseif ($filter === 'user') {
            $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'like', '%' . $search . '%');
            });
        }
    
        $filteredActivities = $query->get();
    
        // Create a new TCPDF instance
        $pdf = new TCPDF();
    
        // Set document information
        $pdf->SetCreator('iLab Booking System');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('System Activities PDF');
        $pdf->SetSubject('System Activities Report');
        $pdf->SetKeywords('system activities, report, PDF');
        $pdf->SetMargins(20, 20, 20);
    
        // Add a page
        $pdf->AddPage();
    
        // Set font
        $pdf->SetFont('times', '', 12);
    
        // Extend the PDF template and pass the $filteredActivities variable
        $pdf->writeHTML(view('pdf.template', ['activities' => $filteredActivities])->render());
    
        $pdf->SetY(-15); // Move to the bottom of the page
        $pdf->SetFont('helvetica', 'I', 8);
        $pdf->Cell(0, 10, 'Page ' . $pdf->getAliasNumPage() . ' of ' . $pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        // Output the PDF (inline or as a download)
        return $pdf->Output('system_activities.pdf', 'D');
    }
    
    public function items(){
        $items=Item::all();
        $items = Item::simplePaginate(10); // You can specify the number of items per page (e.g., 10 per page) // You can change the number of items per page (e.g., 10) as needed
        return view('super-admin.items',compact('items'));
    }

    public function storeItems(Request $request)
    {
        // Validation rules for the asset creation form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'asset_tag' => 'required|string|max:50',
        ]);
    
        // Create and save the asset
        $item = new Item([
            'name' => $validatedData['name'],
            'asset_tag' => $validatedData['asset_tag'],
        ]);
    
        $item->save();
    
        $items=Item::all();
        return redirect()->back()->with('success', 'Asset added successfully');
    }
    public function deleteItem(Item $item)
{
    // Delete the item from the database
    $item->delete();
    $items=Item::all();


    return redirect()->back()->with('success', 'Item deleted successfully');
}
// SuperAdminController.php
public function updateItem(Request $request, $id)
{
    // Validation rules for updating the item
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'asset_tag' => 'required|string|max:50',
    ]);

    // Find the item by ID
    $item = Item::findOrFail($id);

    // Update the item's attributes
    $item->update([
        'name' => $validatedData['name'],
        'asset_tag' => $validatedData['asset_tag'],
    ]);

    // Redirect back to the page with a success message
    return redirect()->back()->with('success', 'Item updated successfully');
}
public function Department(){
    $departments=Department::all();
    return view('super-admin.department',compact('departments'));
}
public function storeDepartment(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255', // Add any validation rules you need
    ]);

    // Create and store the department
    $department = new Department();
    $department->name = $validatedData['name'];
    $department->save();

    return redirect()->back()->with('success', 'Department added successfully');
}
public function updateDepartment(Request $request, Department $department)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $department->update([
        'name' => $request->input('name'),
    ]);

    return redirect()->back()->with('success', 'Department updated successfully.');
}

public function destroy(Department $department)
{
    $department->delete();

    return redirect()->back()->with('success', 'Department deleted successfully.');
}


public function rooms(){
    $rooms=Room::all();
    $rooms = Room::simplePaginate(10); // You can specify the number of items per page (e.g., 10 per page) // You can change the number of items per page (e.g., 10) as needed


    return view('super-admin.room',compact('rooms'));
}

public function storeRoom(Request $request)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'capacity' => 'required|integer',
    ]);

    // Create a new room using the validated data
    Room::create($validatedData);

    // Redirect back or to a specific page after creating the room
    return redirect()->back()->with('success', 'Room created successfully');
}
public function updateRoom(Request $request, Room $room)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'capacity' => 'required|integer',
    ]);

    // Update the room attributes
    $room->update($validatedData);

    // Redirect back or to a specific page after updating the room
    return redirect()->back()->with('success', 'Room updated successfully');
}
public function Roomdestroy(Room $room)
{
    // Delete the room
    $room->delete();

    // Redirect back or to a specific page after deleting the room
    return redirect()->back()   ->with('success', 'Room deleted successfully');
}
}
