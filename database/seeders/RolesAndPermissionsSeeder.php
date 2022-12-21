<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
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
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


         // Misc
         $miscPermission = Permission::create(['name' => 'N/A']);

         // USER MODEL
         $userPermission1 = Permission::create(['name' => 'create: user']);
         $userPermission2 = Permission::create(['name' => 'read: user']);
         $userPermission3 = Permission::create(['name' => 'update: user']);
         $userPermission4 = Permission::create(['name' => 'delete: user']);

         // ROLE MODEL
         $rolePermission1 = Permission::create(['name' => 'create: role']);
         $rolePermission2 = Permission::create(['name' => 'read: role']);
         $rolePermission3 = Permission::create(['name' => 'update: role']);
         $rolePermission4 = Permission::create(['name' => 'delete: role']);

         // PERMISSION MODEL
         $permission1 = Permission::create(['name' => 'create: permission']);
         $permission2 = Permission::create(['name' => 'read: permission']);
         $permission3 = Permission::create(['name' => 'update: permission']);
         $permission4 = Permission::create(['name' => 'delete: permission']);

         // ADMINS
         $adminPermission1 = Permission::create(['name' => 'read: admin']);
         $adminPermission2 = Permission::create(['name' => 'update: admin']);

         // CREATE ROLES
         $userRole = Role::create(['name' => 'user'])->syncPermissions([
             $miscPermission,
         ]);

         $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
             $userPermission1,
             $userPermission2,
             $userPermission3,
             $userPermission4,
             $rolePermission1,
             $rolePermission2,
             $rolePermission3,
             $rolePermission4,
             $permission1,
             $permission2,
             $permission3,
             $permission4,
             $adminPermission1,
             $adminPermission2,
             $userPermission1,
         ]);
         $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
             $userPermission1,
             $userPermission2,
             $userPermission3,
             $userPermission4,
             $rolePermission1,
             $rolePermission2,
             $rolePermission3,
             $rolePermission4,
             $permission1,
             $permission2,
             $permission3,
             $permission4,
             $adminPermission1,
             $adminPermission2,
             $userPermission1,
         ]);


         // CREATE ADMINS & USERS
         User::create([
             'name' => 'super admin',
             'email' => 'super@admin.com',
             'email_verified_at' => now(),
             'password' => Hash::make('password'),
             'remember_token' => Str::random(10),
         ])->assignRole($superAdminRole);

         User::create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'email_verified_at' => now(),
             'password' => Hash::make('password'),
             'remember_token' => Str::random(10),
         ])->assignRole($adminRole);
    }
}
