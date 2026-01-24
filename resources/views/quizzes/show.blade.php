@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Quiz: {{ $quiz->title }}</h1>
        <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:underline">Back to Course</a>
    </div>

    <form action="{{ route('student.quizzes.submit', [$course, $quiz]) }}" method="POST">
        @csrf
        @foreach($quiz->questions as $index => $question)
            <div class="mb-6">
                <p class="font-semibold mb-2">{{ $index + 1 }}. {{ $question->question_text }}</p>
                <div class="space-y-2">
                    @foreach($question->options as $key => $option)
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="question_{{ $question->id }}" value="{{ $key }}" required>
                            <span>{{ $option }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Submit Quiz</button>
    </form>
</div>
@endsection
