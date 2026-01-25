@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="glass-card p-10 rounded-3xl shadow-2xl relative overflow-hidden">
        <!-- Decorative blobs -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob animation-delay-2000"></div>

        <div class="relative z-10">
            <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b border-gray-100 pb-4">Edit Profil</h1>

            <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 text-green-700 p-4 rounded-xl flex items-center shadow-sm border border-green-200">
                        <span class="text-xl mr-2">✅</span> {{ session('success') }}
                    </div>
                @endif

                <div class="flex flex-col items-center mb-8">
                    <div class="relative group cursor-pointer w-32 h-32 mb-4">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-full h-full rounded-full object-cover border-4 border-white shadow-lg group-hover:opacity-75 transition">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=128" alt="Avatar" class="w-full h-full rounded-full object-cover border-4 border-white shadow-lg group-hover:opacity-75 transition">
                        @endif
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="bg-black/50 text-white text-xs px-2 py-1 rounded">Change</span>
                        </div>
                        <input type="file" name="avatar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" title="Change Avatar">
                    </div>
                    <p class="text-sm text-gray-500">Click image to upload new avatar</p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->nm_user ?? $user->name) }}" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" required>
                    @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="mb-8">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 rounded-xl bg-white/50 border border-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition" required>
                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end gap-4">
                    <a href="/dashboard" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-600 font-bold hover:bg-gray-200 transition">Batal</a>
                    <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold shadow-lg hover:shadow-cyan-500/50 hover:scale-[1.02] transition transform">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelector('input[name="avatar"]').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('img[alt="Avatar"]').src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endpush
