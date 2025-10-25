<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsSeeder extends Seeder
{
    public function run()
    {
        DB::table('lessons')->insert([
            [
                'title' => 'Bài 1: Giới thiệu khóa học',
                'course_id' => 21,
                'description' => 'Tổng quan nội dung và mục tiêu khóa học.',
                'notes' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bài 2: Cài đặt công cụ',
                'course_id' => 21,
                'description' => 'Hướng dẫn cài phần mềm và công cụ cần thiết.',
                'notes' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bài 3: Kiến thức nền tảng',
                'course_id' => 21,
                'description' => 'Giải thích các khái niệm cơ bản trước khi bắt đầu.',
                'notes' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
