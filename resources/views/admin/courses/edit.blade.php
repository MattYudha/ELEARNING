@extends('layouts.admin')

@section('title', 'Edit Course')

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $course->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Thumbnail URL</label>
                <input type="url" name="thumbnail" class="form-control" value="{{ $course->thumbnail }}">
            </div>
            <div class="form-check">
                <input type="checkbox" name="is_published" class="form-check-input" id="publishCheck" {{ $course->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="publishCheck">Publish</label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Course</button>
        </div>
    </form>
</div>
@endsection
