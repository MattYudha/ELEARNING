<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function create(Course $course)
    {
        return view('admin.modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $course->modules()->create([
            'title' => $request->title,
            'order' => $course->modules()->max('order') + 1,
        ]);

        return redirect()->route('admin.courses.show', $course)->with('success', 'Module added successfully.');
    }

    public function edit(Course $course, Module $module)
    {
        return view('admin.modules.edit', compact('course', 'module'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $module->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.courses.show', $course)->with('success', 'Module updated successfully.');
    }

    public function destroy(Course $course, Module $module)
    {
        $module->delete();
        return redirect()->route('admin.courses.show', $course)->with('success', 'Module deleted successfully.');
    }
}
