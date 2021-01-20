<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Samuel Jackson';
        $user->email = 'user@test.com';
        $user->password = bcrypt('User1234');
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Neo Tester';
        $admin->email = 'admin@test.com';
        $admin->password = bcrypt('Admin1234');
        $admin->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $admin->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());

        $super_admin = new User;
        $super_admin->name = 'Tosby';
        $super_admin->email = 'super@test.com';
        $super_admin->password = bcrypt('Super1234');
        $super_admin->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $super_admin->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $super_admin->save();
        $super_admin->roles()->attach(Role::where('name', 'Super admin')->first());

        $vendor = new User;
        $vendor->name = 'Tosby';
        $vendor->email = 'vendor@test.com';
        $vendor->password = bcrypt('Vendor1234');
        $vendor->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $vendor->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $vendor->save();
        $vendor->roles()->attach(Role::where('name', 'Vendor')->first());
    }
}
