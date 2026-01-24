@extends('layouts.admin')

@section('title', 'Module: ' . $module->title)

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.courses.show', $module->course) }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Back to Course
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lessons</h3>
        <div class="card-tools">
            <a href="{{ route('admin.modules.lessons.create', $module) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Lesson
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($module->lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->title }}</td>
                        <td>
                            @if($lesson->type == 'video')
                                <span class="badge badge-info">Video</span>
                            @else
                                <span class="badge badge-secondary">Text</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.modules.lessons.edit', [$module, $lesson]) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.modules.lessons.destroy', [$module, $lesson]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete lesson?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Quizzes</h3>
        <div class="card-tools">
            <a href="{{ route('admin.modules.quizzes.create', $module) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Quiz
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Questions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($module->quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }}</td>
                        <td>{{ $quiz->questions->count() }}</td>
                        <td>
                            <a href="{{ route('admin.quizzes.show', $quiz) }}" class="btn btn-sm btn-success">Manage Questions</a>
                            <a href="{{ route('admin.modules.quizzes.edit', [$module, $quiz]) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.modules.quizzes.destroy', [$module, $quiz]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete quiz?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
