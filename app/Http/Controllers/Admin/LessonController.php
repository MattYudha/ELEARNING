<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function create(Module $module)
    {
        return view('admin.lessons.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        $module->lessons()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'content' => $request->content,
            'video_url' => $request->video_url,
            'type' => $request->video_url ? 'video' : 'text',
            'order' => $module->lessons()->max('order') + 1,
        ]);

        return redirect()->route('admin.modules.show', $module)->with('success', 'Lesson added successfully.');
    }

    public function show(Module $module)
    {
        // This is actually showing the Module's lessons
        return view('admin.modules.show', compact('module'));
    }

    public function edit(Module $module, Lesson $lesson)
    {
        return view('admin.lessons.edit', compact('module', 'lesson'));
    }

    public function update(Request $request, Module $module, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        $lesson->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'video_url' => $request->video_url,
            'type' => $request->video_url ? 'video' : 'text',
        ]);

        return redirect()->route('admin.modules.show', $module)->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Module $module, Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.modules.show', $module)->with('success', 'Lesson deleted successfully.');
    }
}
