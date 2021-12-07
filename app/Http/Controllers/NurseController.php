<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        return view('/home');
    }

    public function updatemedicalhistory(Request $request)
    {
        // Get current user
        $userId = Auth::id();
        $user = User::findOrFail($userId);

      
        // Fill user model
        $user->fill([
            'weight' => $request->weight,
            'height' => $request->height,
            'medical_problems' =>$request->medical_problems,
            'allergies' => $request->allergies,
            'medication' => $request->medication,
            'phone_number'=> $request->phone_number,
            'profile_photo' => $request->profile_photo,
        ]);

        // Save user to database
        $user->save();

        // Redirect to route
        return redirect()->route('nurse_landing');
    }
    public function updatePatientsDetails(Request $request)
    {
        // Get current user
        $userId = Auth::id();
        $user = User::findOrFail($userId);

      
        // Fill user model
        /*'name',
        'email',
        'password',
        'city',
        'phone_number',
        'profile_photo',
        */
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'profile_photo' => $request->profile_photo,
        ]);

        // Save user to database
        $user->save();

        // Redirect to route
        return redirect()->route('nurse_landing');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $city = $request->city;
        $phone_number = $request->phone_number;
        $profile_photo = $request->profile_photo;
        $user->save();


        //
    }
    public function patientsWaiting(){
        return view('doctors/patients_waiting');
    }

    public function vitals(){
        return view('doctors/vitals');
    }
    
    public function history(){
        return view('doctors/history');
    }
}
