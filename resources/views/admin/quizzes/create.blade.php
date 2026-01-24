@extends('layouts.admin')

@section('title', 'Add Quiz to ' . $module->title)

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.modules.quizzes.store', $module) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Quiz</button>
            <a href="{{ route('admin.modules.show', $module) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
