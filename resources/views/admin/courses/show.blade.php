@extends('layouts.admin')

@section('title', 'Course: ' . $course->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modules</h3>
        <div class="card-tools">
            <a href="{{ route('admin.courses.modules.create', $course) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Module
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Lessons</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->modules as $module)
                    <tr>
                        <td>{{ $module->title }}</td>
                        <td>{{ $module->lessons->count() }}</td>
                        <td>
                            <a href="{{ route('admin.modules.show', $module) }}" class="btn btn-sm btn-success">Manage</a>
                            <a href="{{ route('admin.courses.modules.edit', [$course, $module]) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.courses.modules.destroy', [$course, $module]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete module?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
