<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\StudentTest;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TestController extends Controller
{
    // Hiển thị trang làm bài
    public function test($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        // dd($quiz);

        return view('frontend.tests.do_test', compact('quiz'));
    }

    // Nhận kết quả nộp bài
    public function submitTest(Request $request, $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $idStudent = currentUserId(); // id học viên đang đăng nhập
        // dd($idStudent);

        $answers = $request->input('answers', []); // dạng ['question_id' => 'a']

        $totalQuestions = count($quiz->questions);
        $correctCount = 0; // đáp án đúng

        // tạo bản ghi student_tests
        $studentTest = StudentTest::create([
            'student_id' => $idStudent,
            'quiz_id' => $quiz->id,
            'started_at' => Carbon::now()->subMinutes($quiz->test_time),
            'finished_at' => Carbon::now(),
            'total_questions' => $totalQuestions,
            'score' => 0,
        ]);

        // lưu từng câu trả lời
        foreach ($quiz->questions as $question) {
            $selected = $answers[$question->id] ?? null;
            $isCorrect = $selected === $question->correct_answer;
            if ($isCorrect) $correctCount++;

            StudentAnswer::create([
                'student_test_id' => $studentTest->id,
                'question_id' => $question->id,
                'selected_answer' => $selected,
                'is_correct' => $isCorrect,
            ]);
        }
        // cập nhật điểm
        $score = round(($correctCount / $totalQuestions) * 10, 2);
        $studentTest->update([
            'score' => $score,
            'correct_count' => $correctCount,
        ]);

        return redirect()->route('test.result', $studentTest->id);
    }

    // Trang xem kết quả
    public function result($id)
    {
        // dd('trang xem kết quả');
        $studentTest = StudentTest::findOrFail($id);

        return view('frontend.tests.result', compact('studentTest'));
    }
}
