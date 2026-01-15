<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(1);
        // dd(Auth::user());
        // $id = encryptor('decrypt', session('userId'));
        // $user = User::find($id);
        // dd($user);
        // dd(Session::get('instructorId'));
        // dd(session()->all());
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalEnrollments = Enrollment::where('created_at', '>=', Carbon::now()->subMonths(2))
            ->count();
        $enrollments = Enrollment::where('created_at', '>=', Carbon::now()->subMonths(2))
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        $totalTuitionFee = Enrollment::join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->where('enrollments.status', '1')
            ->sum('courses.price');
        // dd($totalTuitionFee);


        return view('backend.adminDashboard', compact('totalStudents', 'totalCourses', 'totalTuitionFee', 'totalEnrollments', 'enrollments'));
    }
}
