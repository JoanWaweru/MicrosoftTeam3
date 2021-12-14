<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $user= User::whereHas('roles', function($role) {
            $role->where('name', '!=', 'patient');
        })->get();

        return view('admin.roles',['user'=>$user]);
    }

    public function registeredStaff()
    {
//        $user= User::where('role',$role)->get();
        // $user = DB::select('select * from users where role != "Patient"');
        $user= User::whereHas('roles', function($role) {
            $role->where('name', '!=', 'patient');
        })->get();
        return view('admin.registered_staff',['user'=>$user]);
//        return view('admin/registered_staff');
    }

    public function addStaff(User $user=null)
    {
        //$id=Auth::id();
        //$user = User::where('id','=',$id)->first();
        if($user!=null && Auth::id()->role=='admin')
            $user_to_edit = $user;
        else
            $user_to_edit = Auth::id();
        return view('admin.add_staff',['user'=>$user_to_edit]);

        //return view('admin/add_staff');
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
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required'
        ]);

        //storing Image in the public directory
        $photo= $request->file('profile_photo');
        
        if($photo){
            $imageExtension = $photo->extension();
            $photoName = "profile_image".$user_id.'.'.$imageExtension;
            $path=$photo->storeAs('profilePhotos',$photoName,'public');
            $user->profile_photo = $photoName;
        }


        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->update();

        return redirect('/view_profile')->with('success', 'Profile has been updated!');
    }

    public function updateStaff(Request $request, $id)
    {
//        $id=  Auth::id();
        $user = User::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);
//        $user = User::where('id',$id)->first();

        //storing Image in the public directory
        $user_id = Auth::id();

        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->update();

        return redirect('/roles')->with('success', 'Staff Profile has been updated!');
    }

    public function deleteStaff(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user = DB::delete('delete from users where id = ?', [$id]);

        $user = User::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);
//        $user = User::where('id',$id)->first();

        //storing Image in the public directory
        $user_id = Auth::id();

        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->delete();

        return redirect('/roles')->with('success', 'Staff Member has been deleted from database!');

    }


}
