<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class SearchCourseController extends Controller
{
    public function index(Request $request)
    {
        $textS = '';
        if ($request->input('textSearch'))
            $textS = $request->input('textSearch');
        $category = CourseCategory::get();
        $selectedCategories = $request->input('categories', []);

        $course = Course::where('status', 2)->where('title', 'like', '%' . $textS . '%')
            ->when($selectedCategories, function ($query) use ($selectedCategories) {
                $query->whereIn('course_category_id', $selectedCategories);
            })->paginate(6);
        // dd ($course);



        $allCourse = Course::where('status', 2)->get();

        return view('frontend.searchCourse', compact('course', 'category', 'selectedCategories', 'allCourse'));
    }
}
