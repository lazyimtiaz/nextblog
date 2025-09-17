<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles if not already created
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $authorRole = Role::firstOrCreate(['name' => 'author']);

        // Create an admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('admin123'), 
            ]
        );
        $admin->assignRole($adminRole);

        // Create an author user
        $author = User::firstOrCreate(
            ['email' => 'author@example.com'],
            [
                'name' => 'Content Author',
                'password' => bcrypt('author123'),
            ]
        );
        $author->assignRole($authorRole);
    }
}
