<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cached roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create([
            'name' => 'user'
        ]);

        // $user = factory(User::class)->create();
        // $user->assignRole('user');

        Role::create([
            'name' => 'admin'
        ]);

        // $admin = factory(User::class)->create([
        //     'name' => 'Nurul Arifin',
        //     'email' => 'arifinnurul957@gmail.com'
        // ]);

        //$admin->assignRole('admin');
    }
}
