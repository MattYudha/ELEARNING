@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass-card p-10 rounded-3xl shadow-xl relative overflow-hidden">
        <!-- Decorative blob -->
        <div class="absolute -top-20 -right-20 w-60 h-60 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
        
        <div class="relative z-10">
            <div class="flex justify-between items-center mb-10 pb-6 border-b border-gray-100">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-800">Quiz: {{ $quiz->title }}</h1>
                    <p class="text-gray-500 mt-2">Test your knowledge</p>
                </div>
                <a href="{{ route('courses.show', $course) }}" class="text-gray-500 hover:text-blue-600 font-medium transition">Cancel</a>
            </div>
        
            <form action="{{ route('student.quizzes.submit', [$course, $quiz]) }}" method="POST">
                @csrf
                <div class="space-y-10">
                    @foreach($quiz->questions as $index => $question)
                        <div class="glass p-6 rounded-2xl">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex">
                                <span class="bg-blue-100 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center text-sm mr-3 shrink-0">{{ $index + 1 }}</span>
                                {{ $question->question_text }}
                            </h3>
                            
                            <div class="space-y-3 pl-11">
                                @foreach($question->options as $key => $option)
                                    <label class="flex items-center p-4 rounded-xl border border-transparent bg-white/50 hover:bg-blue-50 hover:border-blue-200 cursor-pointer transition group">
                                        <input type="radio" name="question_{{ $question->id }}" value="{{ $key }}" class="w-5 h-5 text-blue-600 focus:ring-blue-500 border-gray-300" required>
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-700 font-medium">{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
        
                <div class="mt-12 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="px-8 py-4 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold text-lg shadow-xl hover:shadow-purple-500/30 hover:-translate-y-1 transition transform">
                        Submit Quiz Answers
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
