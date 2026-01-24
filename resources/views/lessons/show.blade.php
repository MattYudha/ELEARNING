@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar Navigation -->
    <div class="w-1/4 bg-white p-4 rounded shadow mr-4 hidden md:block">
        <h3 class="font-bold mb-4">{{ $course->title }}</h3>
        @foreach($course->modules as $mod)
            <div class="mb-4">
                <h4 class="font-semibold text-sm text-gray-600 mb-2">{{ $mod->title }}</h4>
                <ul class="text-sm">
                    @foreach($mod->lessons as $l)
                        <li class="mb-1">
                            <a href="{{ route('lessons.show', [$course, $l]) }}" class="{{ $l->id === $lesson->id ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-500' }}">
                                {{ $l->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    <!-- Main Content -->
    <div class="w-full md:w-3/4 bg-white p-8 rounded shadow">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{ $lesson->title }}</h1>
            @if($completed)
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded text-sm">Completed</span>
            @endif
        </div>

        @if($lesson->type == 'video' && $lesson->video_url)
            <div class="mb-6 aspect-w-16 aspect-h-9">
                {{-- Simple iframe embedding for Youtube/generic --}}
                <iframe src="{{ str_replace('watch?v=', 'embed/', $lesson->video_url) }}" class="w-full h-96" allowfullscreen></iframe>
            </div>
        @endif

        <div class="prose max-w-none mb-8">
            {!! nl2br(e($lesson->content)) !!}
        </div>

        <div class="flex justify-between items-center border-t pt-6">
            @if(!$completed)
                <form action="{{ route('lessons.complete', [$course, $lesson]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Mark as Complete</button>
                </form>
            @else
                <button disabled class="bg-gray-300 text-gray-600 px-4 py-2 rounded cursor-not-allowed">Completed</button>
            @endif

            @if($nextLesson)
                <a href="{{ route('lessons.show', [$course, $nextLesson]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Next Lesson &rarr;</a>
            @endif
        </div>
    </div>
</div>
@endsection
