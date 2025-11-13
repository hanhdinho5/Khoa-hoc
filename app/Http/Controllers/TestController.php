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
        $idStudent = currentUserId(); // id học viên đang đăng nhập

        // Tạo bản ghi student_tests khi bắt đầu làm bài
        $studentTest = StudentTest::create([
            'student_id' => $idStudent,
            'quiz_id' => $quiz->id,
            'started_at' => Carbon::now(),
            'total_questions' => count($quiz->questions),
            'score' => 0,
        ]);

        // Gửi ID bài làm sang view để form nộp bài có thể gửi lại
        return view('frontend.tests.do_test', compact('quiz', 'studentTest'));
    }

    // Nhận kết quả nộp bài
    public function submitTest(Request $request, $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $answers = $request->input('answers', []); // dạng ['question_id' => 'a']
        $studentTestId = $request->input('student_test_id'); // lấy từ form

        $studentTest = StudentTest::findOrFail($studentTestId);

        $totalQuestions = count($quiz->questions);
        $correctCount = 0;

        // Lưu từng câu trả lời
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

        // Tính điểm và cập nhật lại bài test
        $score = round(($correctCount / $totalQuestions) * 10, 2);

        $studentTest->update([
            'finished_at' => Carbon::now(),
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
