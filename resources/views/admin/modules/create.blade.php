@extends('layouts.admin')

@section('title', 'Add Module to ' . $course->title)

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.courses.modules.store', $course) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Module</button>
            <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
