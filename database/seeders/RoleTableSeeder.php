<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_regular_user = new Role;
            $role_regular_user->name = 'user';
            $role_regular_user->description = 'A regular user';
            $role_regular_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_regular_user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_regular_user->save();

            $role_admin_user = new Role;
            $role_admin_user->name = 'admin';
            $role_admin_user->description = 'An admin user';
            $role_admin_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_admin_user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_admin_user->save();

            $role_super_admin_user = new Role;
            $role_super_admin_user->name = 'Super admin';
            $role_super_admin_user->description = 'An elevated admin user';
            $role_super_admin_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_super_admin_user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_super_admin_user->save(); 

            $role_super_vendor_user = new Role;
            $role_super_vendor_user->name = 'Vendor';
            $role_super_vendor_user->description = 'Property or hotel owner';
            $role_super_vendor_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_super_vendor_user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $role_super_vendor_user->save();
    }
}
