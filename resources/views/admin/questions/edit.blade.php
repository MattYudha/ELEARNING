@extends('layouts.admin')

@section('title', 'Edit Question')

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.quizzes.questions.update', [$quiz, $question]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Question Text</label>
                <textarea name="question_text" class="form-control" rows="3" required>{{ $question->question_text }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option A</label>
                        <input type="text" name="option_a" class="form-control" value="{{ $question->options['A'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option B</label>
                        <input type="text" name="option_b" class="form-control" value="{{ $question->options['B'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option C</label>
                        <input type="text" name="option_c" class="form-control" value="{{ $question->options['C'] ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Option D</label>
                        <input type="text" name="option_d" class="form-control" value="{{ $question->options['D'] ?? '' }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Correct Answer</label>
                <select name="correct_answer" class="form-control">
                    <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>Option A</option>
                    <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>Option B</option>
                    <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>Option C</option>
                    <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>Option D</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Question</button>
            <a href="{{ route('admin.quizzes.show', $quiz) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
