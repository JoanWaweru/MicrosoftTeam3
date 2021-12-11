<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'read']);

        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('edit','delete','read');

        $patient = Role::create(['name' => 'patient']);

        $doctor = Role::create(['name' => 'doctor']);
        $doctor->givePermissionTo('add user','edit','delete');

        $nurse = Role::create(['name' => 'nurse']);
        $nurse->givePermissionTo('add user','edit');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([

            'name' => 'Example Admin',

            'email' => 'admin@example.com',
            'status' => 'Active',
            'date_of_birth' => 10-8-2001,
            'password' => bcrypt('12345678'),
            'city' => 'Lost city',
            'role' => 'Admin',
            'phone_number' => '+2547123456788',
        ]);
        $user->assignRole($admin);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Patient',

            'email' => 'patient@example.com',
            'status' => 'Active',
            'date_of_birth' => 10-8-2001,
            'password' => bcrypt('12345678'),
            'date_of_birth' => '19-06-2000',
            'city' => 'Lost city',
            'role' => 'Patient',
            'phone_number' => '+2547123456788',

        ]);
        $user->assignRole($patient);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Doctor',
            'email' => 'doctor@example.com',
            'status' => 'Active',
            'date_of_birth' => 10-8-2001,
            'password' => bcrypt('12345678'),
            'city' => 'Found city',
            'role' => 'Doctor',
            'phone_number' => '+2547123456788',

        ]);
        $user->assignRole($nurse);

        $user = \App\Models\User::factory()->create([

            'name' => 'Example Nurse',

            'email' => 'nurse@example.com',
            'status' => 'Active',
            'date_of_birth' => 10-8-2001,
            'password' => bcrypt('12345678'),
            'city' => 'Nurse city',
            'role' => 'Nurse',
            'phone_number' => '+2547123456788',
        ]);
        $user->assignRole($nurse);

        $user = \App\Models\User::factory()->create([

            'name' => 'Joan Waweru',

            'email' => 'joan.waweru@strathmore.edu',
            'status' => 'Active',
            'date_of_birth' => 10-8-2001,
            'password' => bcrypt('12345678'),
            'city' => 'Nairobi',
            'role' => 'Patient',
            'phone_number' => '+254740182052',
        ]);
        $user->assignRole($patient);
    }
}
