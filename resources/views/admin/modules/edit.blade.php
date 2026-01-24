@extends('layouts.admin')

@section('title', 'Edit Module')

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.courses.modules.update', [$course, $module]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $module->title }}" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Module</button>
            <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
