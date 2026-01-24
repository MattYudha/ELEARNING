<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Module $module)
    {
        return view('admin.quizzes.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $module->quizzes()->create([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.modules.show', $module)->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz, Module $module) // Module passed for breadcrumb? or route param? Route is modules.quizzes.edit? No, using shallow?
    {
        // Route: admin/modules/{module}/quizzes/{quiz}/edit if nested
        // I'll use shallow routes for quiz management if possible to avoid deep nesting issues?
        // Actually module ref needed for redirect
        return view('admin.quizzes.edit', compact('module', 'quiz'));
    }
    
    // Using route model binding with explicit scoping or just passing IDs
    // Route: modules/{module}/quizzes/{quiz}/edit
    public function update(Request $request, Module $module, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $quiz->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.modules.show', $module)->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Module $module, Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.modules.show', $module)->with('success', 'Quiz deleted successfully.');
    }
}
