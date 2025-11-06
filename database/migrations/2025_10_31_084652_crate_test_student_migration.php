<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tạo bảng lưu kết quả làm bài
        Schema::create('student_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->float('score')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->integer('correct_count')->default(0);
            $table->integer('total_questions')->default(0);
            $table->timestamps();
        });
        // Tạo bảng lưu từng câu trả lời của từng bài cho từng học viên

        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_test_id')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->string('selected_answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
        Schema::dropIfExists('student_tests');
    }
};
