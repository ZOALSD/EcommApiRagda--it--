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
        Permission::create(['guard_name' => 'admin', 'name' => 'invoce_clint']);
        Permission::create(['guard_name' => 'admin', 'name' => 'invoce_seller']);
        Permission::create(['guard_name' => 'admin', 'name' => 'invoce_delivery']);
        Permission::create(['guard_name' => 'admin', 'name' => 'clint']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delivery']);
        Permission::create(['guard_name' => 'admin', 'name' => 'order_done']);
        Permission::create(['guard_name' => 'admin', 'name' => 'order_in_delivery']);
        Permission::create(['guard_name' => 'admin', 'name' => 'order_in_seller']);
        Permission::create(['guard_name' => 'admin', 'name' => 'new_order']);
        Permission::create(['guard_name' => 'admin', 'name' => 'village']);
        Permission::create(['guard_name' => 'admin', 'name' => 'area']);
        Permission::create(['guard_name' => 'admin', 'name' => 'ads']);
        Permission::create(['guard_name' => 'admin', 'name' => 'size']);
        Permission::create(['guard_name' => 'admin', 'name' => 'produact']);
        Permission::create(['guard_name' => 'admin', 'name' => 'categor']);
        Permission::create(['guard_name' => 'admin', 'name' => 'manager']);
        Permission::create(['guard_name' => 'admin', 'name' => 'seller']);
        Permission::create(['guard_name' => 'admin', 'name' => 'permisson']);
        Permission::create(['guard_name' => 'admin', 'name' => 'print']);
//       Permission::create(['guard_name' => 'admin' , 'name' => 'report']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit']);
        Permission::create(['guard_name' => 'admin', 'name' => 'remove']);
        Permission::create(['guard_name' => 'admin', 'name' => 'upload']);
        Permission::create(['guard_name' => 'admin', 'name' => 'puse_pro']);
        Permission::create(['guard_name' => 'admin', 'name' => 'ProDelete']);
        Permission::create(['guard_name' => 'admin', 'name' => 'ProImageChange']);

        $role1 = Role::create(['guard_name' => 'admin', 'name' => 'writer']);
        $role1->givePermissionTo('read');
        $role1->givePermissionTo('edit');
        $role1->givePermissionTo('remove');

        // create roles and assign existing permissions

        $role3 = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);

        $role3->givePermissionTo('read');
        $role3->givePermissionTo('invoce_clint');
        $role3->givePermissionTo('invoce_seller');
        $role3->givePermissionTo('invoce_delivery');
        $role3->givePermissionTo('clint');
        $role3->givePermissionTo('delivery');
        $role3->givePermissionTo('order_done');
        $role3->givePermissionTo('order_in_delivery');
        $role3->givePermissionTo('order_in_seller');
        $role3->givePermissionTo('new_order');
        $role3->givePermissionTo('village');
        $role3->givePermissionTo('area');
        $role3->givePermissionTo('ads');
        $role3->givePermissionTo('size');
        $role3->givePermissionTo('produact');
        $role3->givePermissionTo('categor');
        $role3->givePermissionTo('manager');
        $role3->givePermissionTo('seller');
        $role3->givePermissionTo('permisson');
        $role3->givePermissionTo('print');
        $role3->givePermissionTo('edit');
        $role3->givePermissionTo('remove');
        $role3->givePermissionTo('upload');
        $role3->givePermissionTo('read');

        $role3->givePermissionTo('ProImageChange');
        $role3->givePermissionTo('ProDelete');
        $role3->givePermissionTo('puse_pro');

        ///*/*//===============================//

        $role2 = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $role2->givePermissionTo('print');
        $role2->givePermissionTo('read');
        $role2->givePermissionTo('upload');

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
