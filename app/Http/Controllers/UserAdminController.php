<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserAdminController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.registered_staff')->with('users', $users);
    }

    public function create()
    {

        $roles = Role::get();
        return view('admin.add_staff', ['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->only('email', 'name', 'password'));
        $roles = $request['roles'];

        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }

        return redirect()->route('admin.add_staff')
            ->with('flash_message',
                'Staff successfully added.');
    }
    public function show($id)
    {
        return redirect('/admin_landing');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('admin.add_staff', compact('user', 'roles')); //pass user and roles data to view

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); //Get role specified by id

        $input = $request->only(['name', 'email', 'password']);
        $roles = $request['roles'];

        if (isset($roles)) {
            $user->roles()->sync($roles);
        }
        else {
            $user->roles()->detach();
        }
        return redirect()->route('admin.admin_landing')
            ->with('flash_message',
                'User successfully edited.');

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => "User deleted successfully"], 204);
    }

}
