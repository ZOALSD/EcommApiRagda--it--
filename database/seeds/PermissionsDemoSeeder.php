<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * // Create a manager role for users authenticating with the admin guard:
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'read']);
        Permission::create(['guard_name' => 'admin', 'name' => 'طباعة']);
//       Permission::create(['guard_name' => 'admin' , 'name' => 'report']);
        Permission::create(['guard_name' => 'admin', 'name' => 'تعديل']);
        Permission::create(['guard_name' => 'admin', 'name' => 'حذف']);
        Permission::create(['guard_name' => 'admin', 'name' => 'رفع']);
        Permission::create(['guard_name' => 'admin', 'name' => 'puse_pro']);
        Permission::create(['guard_name' => 'admin', 'name' => 'ProDelete']);
        Permission::create(['guard_name' => 'admin', 'name' => 'ProImageChange']);

        $role1 = Role::create(['guard_name' => 'admin', 'name' => 'writer']);
        $role1->givePermissionTo('read');
        $role1->givePermissionTo('تعديل');
        $role1->givePermissionTo('حذف');

        // create roles and assign existing permissions

        $role3 = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);

        $role3->givePermissionTo('ProImageChange');
        $role3->givePermissionTo('ProDelete');
        $role3->givePermissionTo('puse_pro');

        ///*/*//===============================//

        $role2 = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $role2->givePermissionTo('طباعة');
        $role2->givePermissionTo('read');
        $role2->givePermissionTo('رفع');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $Admin = \App\Admin::create([
            'name' => 'admin',
            'email' => 'test@test.com',
            'password' => bcrypt(123456),
        ]);
        $Admin->assignRole($role3);

        for ($i = 1; $i <= 15; $i++) {
            // create demo users
            $user = \App\Admin::create([
                'name' => 'Admin number :' . $i,
                'email' => 'Admin' . $i . '@me.com',
                'phone' => $i . '343434',
                'password' => Hash::make('Admin' . $i . '@me.com'),
            ]);
            $user->assignRole($role1);

        }

    }
}
