@extends('layouts.admin')

@section('title', 'Courses')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Courses</h3>
        <div class="card-tools">
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>
                            <span class="badge badge-{{ $course->is_published ? 'success' : 'warning' }}">
                                {{ $course->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('admin.courses.edit', $course) }}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $courses->links() }}
    </div>
</div>
@endsection
