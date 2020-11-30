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
        Permission::create(['guard_name' => 'admin' , 'name' => 'print']);
//       Permission::create(['guard_name' => 'admin' , 'name' => 'report']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'edit']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'delete']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'publish']);
        Permission::create(['guard_name' => 'admin' , 'name' => 'unpublish']);

        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => 'admin' , 'name' => 'writer']);
        $role1->givePermissionTo('read');
        $role1->givePermissionTo('edit');
        $role1->givePermissionTo('delete');

        $role2 = Role::create(['guard_name' => 'admin' , 'name' => 'admin']);
        $role2->givePermissionTo('print');
        $role2->givePermissionTo('read');
        $role2->givePermissionTo('publish');
        $role2->givePermissionTo('unpublish');

        $role3 = Role::create(['guard_name' => 'admin' , 'name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Admin::create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Admin::create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Admin::create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}