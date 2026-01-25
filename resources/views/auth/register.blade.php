@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center py-10">
    <div class="glass-card p-10 rounded-3xl shadow-2xl w-full max-w-md relative overflow-hidden">
        <!-- Decorative blob -->
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

        <div class="relative z-10">
        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2 text-center text-gray-800">Bergabung Bersama Kami</h2>
            <p class="text-center text-gray-500 mb-8">Mulai petualangan belajarmu hari ini</p>
            
            <form action="/register" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-semibold text-gray-600">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-semibold text-gray-600">Username</label>
                    <input type="text" name="username" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" placeholder="Username" required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-semibold text-gray-600">Alamat Email</label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" placeholder="you@example.com" required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-semibold text-gray-600">Kata Sandi</label>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" placeholder="••••••••" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-semibold text-gray-600">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" placeholder="••••••••" required>
                </div>
                
                @if ($errors->any())
                    <div class="bg-red-50 text-red-500 p-3 rounded-lg mb-4 text-sm text-center border border-red-100">{{ $errors->first() }}</div>
                @endif
                
                <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold shadow-lg hover:shadow-green-300/50 hover:scale-[1.02] transition transform">
                    Buat Akun
                </button>
            </form>

            <p class="text-center mt-6 text-sm text-gray-500">
                Sudah punya akun? <a href="/login" class="text-blue-600 font-semibold hover:underline">Masuk</a>
            </p>
        </div>
    </div>
</div>
@endsection
