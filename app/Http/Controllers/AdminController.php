<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        $users= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'doctor');
        })->count();

        $patient_Stat= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->count();

        $nurse_Stat= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'nurse');
        })->count();
        return view('admin/admin_landing', compact('users','patient_Stat','nurse_Stat'));
        
        

    }

    public function roles()
    {
        return view('admin/roles');
    }

    public function registeredStaff()
    {
        return view('admin/registered_staff');
    }

    public function addStaff()
    {
        return view('admin/add_staff');
    }

    public function registeredPatients()
    {
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->get();
        
        return view('admin/registered_patients',compact('patients'));
    }  
    
    public function admin_profile()
    {
        $user=Auth::user();
        return view('admin/admin_profile', compact('user'));
    }

    public function view_profile()
    {
        $user=Auth::user();
        return view('admin/view_profile', compact('user'));
        
    }

    public function updateAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'profile_photo'=>'required',
        ]);

        //storing Image in the public directory
        $photo= $request->file('profile_photo');
        $user_id = Auth::id();
        if($photo){
            $imageExtension = $photo->extension();
            $photoName = "profile_image".$user_id.'.'.$imageExtension;
            $path=$photo->storeAs('profilePhotos',$photoName,'public');
            $user->profile_photo = $photoName;
        }

        $user->id=$request->get('id');
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->update();

        return redirect('/view_profile')->with('success', 'Profile has been updated!');
    }

    
}
