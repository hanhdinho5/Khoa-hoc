<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstructorSeeder extends Seeder
{
    public function run()
    {
        // Kiểm tra xem role_id 2 có tồn tại chưa
        $roleId = 2; // giả sử role "Instructor" có id = 2

        DB::table('instructors')->insert([
            [
                'name_en' => 'John Doe',
                'name_bn' => null,
                'contact_en' => '0123456789',
                'contact_bn' => null,
                'email' => 'instructor@test.com',
                'role_id' => $roleId,
                'bio' => 'Giáo viên tiếng Anh có kinh nghiệm 5 năm trong luyện thi IELTS và TOEIC.',
                'title' => 'Senior English Instructor',
                'designation' => 'IELTS & TOEIC Trainer',
                'image' => 'instructors/john_doe.jpg',
                'status' => 1,
                'password' => Hash::make('password123'), // mật khẩu
                'language' => 'en',
                'access_block' => null,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
