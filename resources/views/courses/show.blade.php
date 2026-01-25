@extends('layouts.app')

@section('content')
<div class="glass-card rounded-3xl p-8 mb-10 overflow-hidden relative">
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob"></div>
    
    <div class="flex flex-col md:flex-row gap-10 relative z-10">
        <div class="w-full md:w-1/3 rounded-2xl overflow-hidden shadow-lg">
            <img src="{{ $course->thumbnail ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
        </div>
        <div class="flex-1 flex flex-col justify-center">
            <h1 class="text-4xl font-extrabold mb-4 text-gray-800 tracking-tight">{{ $course->title }}</h1>
            <p class="text-lg text-gray-600 mb-8 leading-relaxed">{{ $course->description }}</p>
            
            @if($isEnrolled)
                <div class="inline-flex items-center px-6 py-3 rounded-xl bg-green-100/50 text-green-700 font-bold border border-green-200/50 backdrop-blur-sm">
                    <span class="mr-2">✓</span> Enrolled
                </div>
            @else
                <form action="{{ route('courses.enroll', $course) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold shadow-lg hover:shadow-cyan-500/50 transform hover:scale-105 transition duration-300">
                        Enroll Now
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>

<div class="glass rounded-3xl p-8 mb-10">
    <h2 class="text-2xl font-bold mb-8 text-gray-800 flex items-center">
        <span class="p-2 rounded-lg bg-blue-100 text-blue-600 mr-3">📚</span> Course Syllabus
    </h2>
    @foreach($course->modules as $module)
        <div class="mb-8 last:mb-0">
            <h3 class="text-xl font-bold mb-4 text-gray-700 border-l-4 border-blue-400 pl-4">{{ $module->title }}</h3>
            <div class="space-y-3 pl-4">
                @foreach($module->lessons as $lesson)
                    <div class="flex items-center p-3 rounded-xl bg-white/40 border border-white/40 hover:bg-white/60 transition">
                        <span class="mr-3 text-lg">
                             @if($lesson->type == 'video') 🎥 @else 📄 @endif
                        </span>
                        @if($isEnrolled)
                            <a href="{{ route('lessons.show', [$course, $lesson]) }}" class="text-blue-700 font-medium hover:text-blue-900 transition flex-1">
                                {{ $lesson->title }}
                            </a> 
                            <span class="text-xs font-semibold bg-blue-100 text-blue-600 px-2 py-1 rounded ml-2">Access</span>
                        @else
                            <span class="text-gray-500 font-medium flex-1">{{ $lesson->title }}</span> 
                            <span class="text-xs text-gray-400 ml-2 italic">🔒 Locked</span>
                        @endif
                    </div>
                @endforeach
                
                @foreach($module->quizzes as $quiz)
                    <div class="flex items-center p-3 rounded-xl bg-purple-50/40 border border-purple-100/40 hover:bg-purple-50/60 transition">
                         <span class="mr-3 text-lg">📝</span>
                         @if($isEnrolled)
                            <a href="{{ route('student.quizzes.show', [$course, $quiz]) }}" class="text-purple-700 font-medium hover:text-purple-900 transition flex-1">
                                Quiz: {{ $quiz->title }}
                            </a>
                         @else
                             <span class="text-gray-500 font-medium flex-1">Quiz: {{ $quiz->title }}</span> 
                             <span class="text-xs text-gray-400 ml-2 italic">🔒 Locked</span>
                         @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
