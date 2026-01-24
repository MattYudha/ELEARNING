@extends('layouts.app')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl font-bold mb-4">Welcome to E-Learning</h1>
    <p class="text-xl text-gray-600">Start learning today with our expert courses</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($courses as $course)
    <div class="bg-white rounded shadow overflow-hidden">
        <img src="{{ $course->thumbnail ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-2">{{ $course->title }}</h2>
            <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
            <a href="{{ route('courses.show', $course) }}" class="block text-center bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                View Course
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
