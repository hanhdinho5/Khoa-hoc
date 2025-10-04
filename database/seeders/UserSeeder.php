<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            // SuperAdmin
            [
                'name_en' => 'SuperAdmin One',
                'name_bn' => null,
                'email' => 'superadmin1@test.com',
                'contact_en' => '0901000001',
                'contact_bn' => null,
                'role_id' => 1,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => true,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'SuperAdmin Two',
                'name_bn' => null,
                'email' => 'superadmin2@test.com',
                'contact_en' => '0901000002',
                'contact_bn' => null,
                'role_id' => 1,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => true,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Admin
            [
                'name_en' => 'Admin One',
                'name_bn' => null,
                'email' => 'admin1@test.com',
                'contact_en' => '0902000001',
                'contact_bn' => null,
                'role_id' => 2,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => true,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Admin Two',
                'name_bn' => null,
                'email' => 'admin2@test.com',
                'contact_en' => '0902000002',
                'contact_bn' => null,
                'role_id' => 2,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => true,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Instructor
            [
                'name_en' => 'Instructor One',
                'name_bn' => null,
                'email' => 'instructor1@test.com',
                'contact_en' => '0903000001',
                'contact_bn' => null,
                'role_id' => 3,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => false,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Instructor Two',
                'name_bn' => null,
                'email' => 'instructor2@test.com',
                'contact_en' => '0903000002',
                'contact_bn' => null,
                'role_id' => 3,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => false,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Student
            [
                'name_en' => 'Student One',
                'name_bn' => null,
                'email' => 'student1@test.com',
                'contact_en' => '0904000001',
                'contact_bn' => null,
                'role_id' => 4,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => false,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Student Two',
                'name_bn' => null,
                'email' => 'student2@test.com',
                'contact_en' => '0904000002',
                'contact_bn' => null,
                'role_id' => 4,
                'password' => Hash::make('password123'),
                'language' => 'en',
                'image' => null,
                'full_access' => false,
                'status' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
