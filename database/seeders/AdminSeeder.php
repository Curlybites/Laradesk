<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=AdminSeeder
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'view users',
            'view permissions',
            'view dashboard',
            'create user',
            'create roles',
            'view user management',
            'view roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'description' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // Create admin role
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
            'description' => 'Administrator role with all permissions',
        ],
        );

        // Get all permissions and assign to admin role
        $allPermissions = Permission::all();
        $adminRole->syncPermissions($allPermissions);

        // Create admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'),
            ],
          
        );
        

        $adminUser->assignRole('admin');


        // guest part 

        $guestRole = Role::firstOrCreate([
            'name' => 'guest',
            'guard_name' => 'web',
            'description' => 'Guest role with limited permissions',
        ]);

        $guestpermissions = [
            'view dashboard',
        ];

        $guestRole->syncPermissions($guestpermissions);


        $guestUser = User::firstOrCreate(
             ['email' => 'guest@guest.com',],
             [
                'name' => 'Guest',
                'password' => bcrypt('guest123'),
             ]
        );

        $guestUser->assignRole('guest');    


    }
}
