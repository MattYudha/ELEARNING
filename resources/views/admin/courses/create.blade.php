@extends('layouts.admin')

@section('title', 'Add Course')

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Thumbnail URL</label>
                <input type="url" name="thumbnail" class="form-control" placeholder="https://...">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Course</button>
        </div>
    </form>
</div>
@endsection
