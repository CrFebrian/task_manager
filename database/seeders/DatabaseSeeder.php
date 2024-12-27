<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(class: [
            TaskSeeder::class,
            CategorySeeder::class
        ]);

    $adminRole = Role::findByName('admin');
    $adminRole->givePermissionTo('melihat posts');
    $adminRole->givePermissionTo('create posts');

    $userRole = Role::findByName('user');
    $userRole->givePermissionTo('melihat posts');
    $user = User::find(3);
    $user->assignRole('admin');
    }
}
