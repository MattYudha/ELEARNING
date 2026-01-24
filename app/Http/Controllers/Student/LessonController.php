<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonCompletion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        // Ensure user is enrolled
        $enrolled = \App\Models\Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();
            
        if (!$enrolled && Auth::user()->role !== 'admin') {
            return redirect()->route('courses.show', $course)->with('error', 'You must enroll first.');
        }

        $completed = LessonCompletion::where('user_id', Auth::id())
            ->where('lesson_id', $lesson->id)
            ->exists();

        // Get next lesson
        $nextLesson = Lesson::where('module_id', $lesson->module_id)
            ->where('order', '>', $lesson->order)
            ->orderBy('order')
            ->first();
            
        if (!$nextLesson) {
             // Check next module
             $nextModule = \App\Models\Module::where('course_id', $course->id)
                 ->where('order', '>', $lesson->module->order)
                 ->orderBy('order')
                 ->first();
             if ($nextModule) {
                 $nextLesson = $nextModule->lessons()->orderBy('order')->first();
             }
        }

        return view('lessons.show', compact('course', 'lesson', 'completed', 'nextLesson'));
    }

    public function complete(Course $course, Lesson $lesson)
    {
        LessonCompletion::firstOrCreate([
            'user_id' => Auth::id(),
            'lesson_id' => $lesson->id,
        ]);

        return back()->with('success', 'Lesson marked as complete!');
    }
}
