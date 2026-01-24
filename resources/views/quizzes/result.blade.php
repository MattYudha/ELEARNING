@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow text-center">
    <h1 class="text-3xl font-bold mb-4">Quiz Results</h1>
    <h2 class="text-xl mb-6">{{ $quiz->title }}</h2>

    <div class="text-6xl font-bold mb-4 {{ $passed ? 'text-green-600' : 'text-red-600' }}">
        {{ $score }} / {{ $total }}
    </div>

    @if($passed)
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
            Congratulations! You passed the quiz.
        </div>
    @else
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            You did not pass. Try again later.
        </div>
    @endif

    <a href="{{ route('courses.show', $course) }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Back to Course</a>
</div>
@endsection
