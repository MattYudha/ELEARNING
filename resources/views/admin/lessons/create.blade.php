@extends('layouts.admin')

@section('title', 'Add Lesson to ' . $module->title)

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.modules.lessons.store', $module) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Video URL (Optional)</label>
                <input type="url" name="video_url" class="form-control" placeholder="Youtube URL etc.">
            </div>
            <div class="form-group">
                <label>Content (Text)</label>
                <textarea name="content" class="form-control" rows="5"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Lesson</button>
            <a href="{{ route('admin.modules.show', $module) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
