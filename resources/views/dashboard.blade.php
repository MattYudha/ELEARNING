@extends('layouts.app')

@section('content')
<div class="glass-card rounded-3xl p-8 mb-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800">Selamat Datang Kembali, {{ Auth::user()->nm_user ?? Auth::user()->name }}!</h1>
            <p class="text-gray-500 mt-1">Siap untuk melanjutkan pembelajaran?</p>
        </div>
        <div class="hidden md:block">
            <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-600 font-bold text-sm">Akun Mahasiswa</span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="glass rounded-2xl p-6 flex flex-col items-center justify-center text-center hover:-translate-y-1 transition duration-300">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-3xl mb-4">🎓</div>
            <h3 class="font-bold text-gray-600 mb-1">Kursus Terdaftar</h3>
            <p class="text-4xl font-extrabold text-blue-600">{{ Auth::user()->enrollments()->count() }}</p>
        </div>
        <div class="glass rounded-2xl p-6 flex flex-col items-center justify-center text-center hover:-translate-y-1 transition duration-300">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-3xl mb-4">✅</div>
            <h3 class="font-bold text-gray-600 mb-1">Materi Diselesaikan</h3>
            <p class="text-4xl font-extrabold text-green-600">{{ Auth::user()->completedLessons()->count() }}</p>
        </div>
    </div>
</div>

<div class="glass-card rounded-3xl p-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Pembelajaran Saya</h2>
    @if(Auth::user()->enrollments()->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(Auth::user()->enrollments as $enrollment)
                <div class="glass rounded-2xl overflow-hidden hover:shadow-lg transition">
                     <div class="h-32 bg-cover bg-center" style="background-image: url('{{ $enrollment->course->thumbnail ?? 'https://via.placeholder.com/400x200' }}')"></div>
                     <div class="p-5">
                         <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $enrollment->course->title }}</h3>
                         <a href="{{ route('courses.show', $enrollment->course) }}" class="text-blue-600 font-semibold hover:underline text-sm flex items-center">
                             Lanjutkan Belajar <span class="ml-1">→</span>
                         </a>
                     </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-10">
            <p class="text-gray-500 mb-4">Anda belum mendaftar kursus apapun.</p>
            <a href="/" class="px-6 py-2 rounded-xl bg-blue-500 text-white font-bold hover:bg-blue-600 transition">Lihat Kursus</a>
        </div>
    @endif
</div>
@endsection
