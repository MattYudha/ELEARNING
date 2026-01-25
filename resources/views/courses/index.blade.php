@extends('layouts.app')

@section('content')
<div class="text-center mb-16 pt-10">
    <h1 class="text-5xl font-extrabold mb-6 text-gray-800 tracking-tight">
        Mulai Perjalanan Belajarmu <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-400">Hari Ini</span>
    </h1>
    <p class="text-xl text-gray-500 max-w-2xl mx-auto">
        Akses berbagai materi pembelajaran dan pengembangan kompetensi untuk mendukung proses perkuliahan dalam lingkungan belajar yang modern dan terstruktur.
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-20">
    @foreach($courses as $course)
    <div class="glass-card rounded-2xl overflow-hidden hover:-translate-y-2 transition duration-300 group">
        <div class="relative h-48 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
            <img src="{{ $course->thumbnail ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $course->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
            <span class="absolute bottom-4 left-4 z-20 text-white font-semibold flex items-center bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm border border-white/30">
                Course
            </span>
        </div>
        
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-3 text-gray-800">{{ $course->title }}</h2>
            <p class="text-gray-500 mb-6 leading-relaxed line-clamp-2">{{ $course->description }}</p>
            
            <a href="{{ route('courses.show', $course) }}" class="block w-full text-center py-3 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold shadow-md hover:shadow-lg hover:shadow-blue-300/50 transition">
                Mulai Belajar
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
