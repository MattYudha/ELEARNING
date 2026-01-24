@extends('layouts.admin')

@section('title', 'Add Question to ' . $quiz->title)

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.quizzes.questions.store', $quiz) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Question Text</label>
                <textarea name="question_text" class="form-control" rows="3" required></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option A</label>
                        <input type="text" name="option_a" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option B</label>
                        <input type="text" name="option_b" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option C</label>
                        <input type="text" name="option_c" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option D</label>
                        <input type="text" name="option_d" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Correct Answer</label>
                <select name="correct_answer" class="form-control">
                    <option value="A">Option A</option>
                    <option value="B">Option B</option>
                    <option value="C">Option C</option>
                    <option value="D">Option D</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Question</button>
            <a href="{{ route('admin.quizzes.show', $quiz) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
