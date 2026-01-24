<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show(Course $course, Quiz $quiz)
    {
        // Ensure enrollment
        $enrolled = \App\Models\Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();

        if (!$enrolled && Auth::user()->role !== 'admin') {
            return redirect()->route('courses.show', $course)->with('error', 'Enroll first.');
        }

        return view('quizzes.show', compact('course', 'quiz'));
    }

    public function submit(Request $request, Course $course, Quiz $quiz)
    {
        $questions = $quiz->questions;
        $score = 0;
        $total = $questions->count();
        $passingScore = ceil($total * 0.7); // 70% passing

        foreach ($questions as $question) {
            $submittedAnswer = $request->input('question_' . $question->id);
            if ($submittedAnswer === $question->correct_answer) {
                $score++;
            }
        }

        $passed = $score >= $passingScore;

        QuizAttempt::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'passed' => $passed,
        ]);

        return view('quizzes.result', compact('course', 'quiz', 'score', 'total', 'passed'));
    }
}
