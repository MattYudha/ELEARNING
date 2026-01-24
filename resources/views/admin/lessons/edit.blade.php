@extends('layouts.admin')

@section('title', 'Edit Lesson')

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.modules.lessons.update', [$module, $lesson]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $lesson->title }}" required>
            </div>
             <div class="form-group">
                <label>Video URL (Optional)</label>
                <input type="url" name="video_url" class="form-control" value="{{ $lesson->video_url }}">
            </div>
            <div class="form-group">
                <label>Content (Text)</label>
                <textarea name="content" class="form-control" rows="5">{{ $lesson->content }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Lesson</button>
            <a href="{{ route('admin.modules.show', $module) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
