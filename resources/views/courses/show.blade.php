@extends('layouts.app')

@section('content')
<div class="bg-white rounded shadow p-8 mb-8">
    <div class="flex flex-col md:flex-row gap-8">
        <img src="{{ $course->thumbnail ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $course->title }}" class="w-full md:w-1/3 rounded object-cover">
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
            <p class="text-gray-700 text-lg mb-6">{{ $course->description }}</p>
            
            @if($isEnrolled)
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    You are enrolled in this course.
                </div>
            @else
                <form action="{{ route('courses.enroll', $course) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded font-bold text-lg hover:bg-blue-700">
                        Enroll Now
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>

<div class="bg-white rounded shadow p-8">
    <h2 class="text-2xl font-bold mb-6">Course Content</h2>
    @foreach($course->modules as $module)
        <div class="mb-6 border-b pb-4 last:border-0">
            <h3 class="text-xl font-semibold mb-3">{{ $module->title }}</h3>
            <ul class="space-y-2 pl-4">
                @foreach($module->lessons as $lesson)
                    <li class="flex items-center">
                        <span class="mr-2">
                             @if($lesson->type == 'video') 🎥 @else 📄 @endif
                        </span>
                        @if($isEnrolled)
                            <a href="{{ route('lessons.show', [$course, $lesson]) }}" class="text-blue-600 hover:underline">{{ $lesson->title }}</a> 
                            {{-- Link to actual lesson viewer later --}}
                        @else
                            <span class="text-gray-500">{{ $lesson->title }}</span> 
                            <span class="text-xs text-gray-400 ml-2">(Enroll to view)</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
