@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row gap-8">
    <!-- Sidebar Navigation -->
    <div class="w-full lg:w-1/4">
        <div class="glass p-6 rounded-2xl sticky top-24 max-h-[80vh] overflow-y-auto">
            <a href="{{ route('courses.show', $course) }}" class="flex items-center text-gray-500 hover:text-blue-600 mb-6 transition">
                <span class="mr-2">←</span> Back to Course
            </a>
            
            <h3 class="font-bold text-lg mb-4 text-gray-800">{{ $course->title }}</h3>
            @foreach($course->modules as $mod)
                <div class="mb-4">
                    <h4 class="font-semibold text-xs uppercase tracking-wider text-gray-400 mb-2 pl-2 border-l-2 border-transparent">{{ $mod->title }}</h4>
                    <ul class="space-y-1">
                        @foreach($mod->lessons as $l)
                            <li>
                                <a href="{{ route('lessons.show', [$course, $l]) }}" class="block px-3 py-2 rounded-lg text-sm transition {{ $l->id === $lesson->id ? 'bg-blue-100/50 text-blue-700 font-bold' : 'text-gray-600 hover:bg-white/50' }}">
                                    {{ $l->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full lg:w-3/4">
        <div class="glass-card p-8 rounded-3xl shadow-xl min-h-[80vh]">
            <div class="mb-6 flex justify-between items-center border-b border-gray-100 pb-6">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-800">{{ $lesson->title }}</h1>
                    <p class="text-sm text-gray-400 mt-1">Module: {{ $lesson->module->title }}</p>
                </div>
                @if($completed)
                    <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-sm font-bold flex items-center shadow-sm">
                        <span class="mr-1">✓</span> Completed
                    </span>
                @endif
            </div>

            @if($lesson->type == 'video' && $lesson->video_url)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-lg border border-white/50">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe src="{{ str_replace('watch?v=', 'embed/', $lesson->video_url) }}" class="w-full h-[500px]" allowfullscreen></iframe>
                    </div>
                </div>
            @endif

            <div class="prose max-w-none mb-10 text-gray-700 leading-relaxed">
                {!! nl2br(e($lesson->content)) !!}
            </div>

            <div class="flex justify-between items-center border-t border-gray-100 pt-8 mt-auto">
                {{-- Prev Button Placeholder --}}
                <div></div> 

                <div class="flex items-center gap-4">
                    @if(!$completed)
                        <form action="{{ route('lessons.complete', [$course, $lesson]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg hover:scale-105 transition transform">
                                Mark as Complete
                            </button>
                        </form>
                    @endif

                    @if($nextLesson)
                        <a href="{{ route('lessons.show', [$course, $nextLesson]) }}" class="bg-blue-100 text-blue-700 px-6 py-3 rounded-xl font-bold hover:bg-blue-200 transition">
                            Next Lesson →
                        </a>
                    @else
                        <a href="{{ route('courses.show', $course) }}" class="bg-gray-100 text-gray-600 px-6 py-3 rounded-xl font-bold hover:bg-gray-200 transition">
                            Finish Course
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
