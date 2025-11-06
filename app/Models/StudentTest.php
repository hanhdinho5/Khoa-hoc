<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'quiz_id',
        'started_at',
        'finished_at',
        'total_questions',
        'score',
        'correct_count',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function studentAnswer() // bảng lưu từng câu trả lời
    {
        return $this->hasMany(StudentAnswer::class);
    }
}
