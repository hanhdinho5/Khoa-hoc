<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MaterialsSeeder extends Seeder
{
    public function run()
    {
        DB::table('materials')->insert([
            [
                'lesson_id' => 1,
                'title' => 'Giới thiệu khóa học',
                'type' => 'video',
                'content' => 'intro.mp4',
                'content_url' => 'https://example.com/videos/intro.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lesson_id' => 1,
                'title' => 'Tài liệu PDF bài 1',
                'type' => 'document',
                'content' => 'lesson1.pdf',
                'content_url' => 'https://example.com/docs/lesson1.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lesson_id' => 1,
                'title' => 'Quiz kiểm tra bài 1',
                'type' => 'quiz',
                'content' => null,
                'content_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
