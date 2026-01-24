<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_published', true)->latest()->get();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = Enrollment::where('user_id', Auth::id())
                ->where('course_id', $course->id)
                ->exists();
        }
        
        // Eager load modules and lessons for display
        $course->load(['modules.lessons']);

        return view('courses.show', compact('course', 'isEnrolled'));
    }

    public function enroll(Course $course)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check if already enrolled
        $exists = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();

        if (!$exists) {
            Enrollment::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id,
            ]);
        }

        return redirect()->route('courses.show', $course)->with('success', 'Enrolled successfully!');
    }
}
