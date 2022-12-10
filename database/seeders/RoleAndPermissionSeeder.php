<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-user']);
       Permission::create(['name' => 'update-user-profile']);
       Permission::create(['name' => 'update-user-profile-email']);
       Permission::create(['name' => 'update-user-profile-password']);
       Permission::create(['name' => 'update-user-profile-data']);
       Permission::create(['name' => 'update-user-profile-picture']);
       Permission::create(['name' => 'update-user-permissions']);
       Permission::create(['name' => 'update-user-roles']);
       Permission::create(['name' => 'suspend-user']);
       Permission::create(['name' => 'delete-user']);
       
       Permission::create(['name' => 'create-post']);
       Permission::create(['name' => 'edit-post']);
       Permission::create(['name' => 'edit-post-owner']);
       Permission::create(['name' => 'edit-post-admin']);
       Permission::create(['name' => 'hide-post']);
       Permission::create(['name' => 'hide-post-admin']);
       Permission::create(['name' => 'delete-post']);
       Permission::create(['name' => 'delete-post-admin']);

       Permission::create(['name' => 'create-role']);
       Permission::create(['name' => 'update-role']);
       Permission::create(['name' => 'update-role-own']);
       Permission::create(['name' => 'suspend-role']);
       Permission::create(['name' => 'delete-role']);

       $adminRole = Role::create(['name' => 'admin']);
       $editorRole = Role::create(['name' => 'editor']);
       $userRole = Role::create(['name' => 'user']);

       $adminRole->givePermissionTo([
        'create-user',
        'update-user-profile',
        'update-user-permissions',
        'update-user-roles',
        'suspend-user',
        'delete-user',
        'create-post',
        'edit-post-admin',
        'hide-post-admin',
        'delete-post-admin',
       ]);

       $editorRole->givePermissionTo([
        'create-post',
        'edit-post',
        'hide-post',
        'delete-post',
       ]);
    }
}
