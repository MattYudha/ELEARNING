@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto text-center pt-10">
    <div class="glass-card p-12 rounded-[2rem] shadow-2xl relative overflow-hidden">
        
        @if($passed)
            <div class="absolute inset-0 bg-gradient-to-br from-green-50/50 to-emerald-100/30"></div>
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center text-5xl mx-auto mb-6 relative z-10 animate-bounce">
                🏆
            </div>
            <h1 class="text-4xl font-extrabold text-gray-800 mb-2 relative z-10">Congratulations!</h1>
            <p class="text-xl text-green-600 font-medium mb-8 relative z-10">You passed the quiz!</p>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-red-50/50 to-pink-100/30"></div>
            <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center text-5xl mx-auto mb-6 relative z-10">
                💪
            </div>
             <h1 class="text-4xl font-extrabold text-gray-800 mb-2 relative z-10">Keep Trying!</h1>
            <p class="text-xl text-red-600 font-medium mb-8 relative z-10">You didn't pass this time.</p>
        @endif

        <div class="relative z-10 glass p-8 rounded-2xl mb-10 max-w-sm mx-auto">
            <span class="block text-gray-500 uppercase text-xs font-bold tracking-widest mb-2">Your Score</span>
            <span class="text-6xl font-black {{ $passed ? 'text-green-600' : 'text-red-600' }}">
                {{ $score }}<span class="text-3xl text-gray-400 font-medium">/{{ $total }}</span>
            </span>
        </div>

        <div class="relative z-10">
            <a href="{{ route('courses.show', $course) }}" class="inline-block px-8 py-3 rounded-xl bg-white text-gray-800 font-bold shadow-lg border border-gray-100 hover:bg-gray-50 transition">
                Back to Course
            </a>
        </div>
    </div>
</div>
@endsection
