<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CourseCategoryAndCourseSeeder extends Seeder
{
    public function run()
    {
        // 1️⃣ Tạo category
        $categories = [
            [
                'category_name' => 'IELTS',
                'category_status' => 1,
                'category_image' => 'categories/ielts.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'TOEIC',
                'category_status' => 1,
                'category_image' => 'categories/toeic.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'General English',
                'category_status' => 1,
                'category_image' => 'categories/general.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('course_categories')->insert($categories);

        // Lấy ID category vừa insert
        $categoryIds = DB::table('course_categories')->pluck('id')->toArray();

        // 2️⃣ Tạo courses
        // Giả sử instructor_id = 1 (bạn phải seed trước instructor)
        $courses = [
            [
                'title_en' => 'IELTS Listening Beginner',
                'title_bn' => null,
                'description_en' => 'Khóa học luyện kỹ năng nghe cho IELTS',
                'description_bn' => null,
                'course_category_id' => $categoryIds[0],
                'instructor_id' => 1,
                'type' => 'paid',
                'price' => 500000,
                'old_price' => 600000,
                'subscription_price' => null,
                'start_from' => Carbon::now()->addDays(7),
                'duration' => 30,
                'lesson' => 10,
                'prerequisites_en' => 'Không cần kiến thức nền',
                'prerequisites_bn' => null,
                'difficulty' => 'beginner',
                'course_code' => 'IELTS-LB-01',
                'image' => 'courses/ielts_listening.jpg',
                'thumbnail_image' => 'courses/thumb_ielts_listening.jpg',
                'thumbnail_video' => null,
                'status' => 2,
                'language' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_en' => 'TOEIC Speaking Advanced',
                'title_bn' => null,
                'description_en' => 'Khóa luyện kỹ năng nói TOEIC nâng cao',
                'description_bn' => null,
                'course_category_id' => $categoryIds[1],
                'instructor_id' => 1,
                'type' => 'paid',
                'price' => 600000,
                'old_price' => null,
                'subscription_price' => null,
                'start_from' => Carbon::now()->addDays(10),
                'duration' => 25,
                'lesson' => 12,
                'prerequisites_en' => 'Đã hoàn thành khóa TOEIC Intermediate',
                'prerequisites_bn' => null,
                'difficulty' => 'advanced',
                'course_code' => 'TOEIC-SA-01',
                'image' => 'courses/toeic_speaking.jpg',
                'thumbnail_image' => 'courses/thumb_toeic_speaking.jpg',
                'thumbnail_video' => null,
                'status' => 2,
                'language' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('courses')->insert($courses);
    }
}
