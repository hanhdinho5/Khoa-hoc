<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgressSeeder extends Seeder
{
    public function run()
    {
        DB::table('progress')->insert([
            [
                'student_id' => 1, // id học viên
                'course_id' => 21, // id khóa học
                'progress_percentage' => 30, // đã học 30%
                'completed' => false, // chưa hoàn thành
                'last_viewed_material_id' => 1, // id của bài học/video gần nhất
                'last_viewed_at' => Carbon::now()->subDays(1), // xem lần cuối cách đây 1 ngày
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 22,
                'progress_percentage' => 100,
                'completed' => true,
                'last_viewed_material_id' => 2,
                'last_viewed_at' => Carbon::now()->subHours(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
