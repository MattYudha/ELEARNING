@extends('layouts.admin')

@section('title', 'Quiz: ' . $quiz->title)

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.modules.show', $quiz->module) }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Back to Module
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Questions</h3>
        <div class="card-tools">
            <a href="{{ route('admin.quizzes.questions.create', $quiz) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Question
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz->questions as $question)
                    <tr>
                        <td>{{ Str::limit($question->question_text, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.quizzes.questions.edit', [$quiz, $question]) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.quizzes.questions.destroy', [$quiz, $question]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete question?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
