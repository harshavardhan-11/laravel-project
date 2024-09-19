<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permission for job application CRUD

        Permission::create(['name' => 'create job']);
        Permission::create(['name' => 'delete job']);
        Permission::create(['name' => 'edit job']);

        // create Admin role and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('create job');
        $admin->givePermissionTo('delete job');
        $admin->givePermissionTo('edit job');

        $superAdmin = Role::create(['name' => 'Super-Admin']);

        $superAdminUser = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'harshavardhan.singam@prophaze.com',
        ]);

        $adminUser = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'harshavardhan.singam99@gmail.com',
        ]);

        $superAdminUser->assignRole($superAdmin);
        $adminUser->assignRole($admin);

    }
}
