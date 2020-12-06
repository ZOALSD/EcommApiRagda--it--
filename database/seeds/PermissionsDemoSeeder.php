<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Permission::create(['guard_name' => 'admin' , 'name' => 'read']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'طباعة']);
//       Permission::create(['guard_name' => 'admin' , 'name' => 'report']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'تعديل']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'حذف']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'رفع']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'تجميد']);

        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => 'admin' , 'name' => 'writer']);
        $role1->givePermissionTo('read');
        $role1->givePermissionTo('تعديل');
        $role1->givePermissionTo('حذف');

        $role2 = Role::create(['guard_name' => 'admin' , 'name' => 'admin']);
        $role2->givePermissionTo('طباعة');
        $role2->givePermissionTo('read');
        $role2->givePermissionTo('رفع');
        $role2->givePermissionTo('تجميد');

        $role3 = Role::create(['guard_name' => 'admin' , 'name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        for($i = 1 ; $i<= 15 ; $i++){
        // create demo users
        $user = \App\Admin::create([
            'name' => 'Admin number :'.$i,
            'email' => 'Admin'.$i.'@example.com',
            'phone' => $i.'343434'
        ]);
        $user->assignRole($role1);
        
       }
     
    }
}