@extends('layouts.admin')

@section('title', 'Edit Quiz')

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.modules.quizzes.update', [$module, $quiz]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Quiz</button>
            <a href="{{ route('admin.modules.show', $module) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
