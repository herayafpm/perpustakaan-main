<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create_buku']);
        Permission::create(['name' => 'edit_buku']);
        Permission::create(['name' => 'show_buku']);
        Permission::create(['name' => 'delete_buku']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        // ROle Admin
        $admin = Role::where(['name' => 'Admin'])->first();
        $permissions = Permission::all();
        $admin->syncPermissions($permissions);
        // Role Admin
        $user = Role::where(['name' => 'User'])->first();
        $permissions = Permission::where(['name' => 'show_buku'])->get()->all();
        $user->syncPermissions($permissions);
    }
}
