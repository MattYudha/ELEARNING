<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            /* Cloud/Wave Gradient */
            background: linear-gradient(135deg, #e0f2fe 0%, #ffffff 50%, #bae6fd 100%);
            min-height: 100vh;
        }
        .glass {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-card {
             background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body class="text-gray-800 antialiased font-sans">
    
    <!-- Navbar (Liquid Glass) -->
    <nav class="glass sticky top-0 z-50 mb-8 border-b border-white/40">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-500 hover:opacity-80 transition">
                 Matt Learning
            </a>
            
            <div class="flex items-center space-x-6">
                @auth
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('student.profile.edit') }}" class="flex items-center space-x-2 group">
                             @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm group-hover:border-blue-300 transition" alt="Avatar">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm group-hover:border-blue-300 transition" alt="Avatar">
                            @endif
                            <span class="text-gray-700 font-medium group-hover:text-blue-600 transition hidden md:block">{{ Auth::user()->name }}</span>
                        </a>

                        <a href="/dashboard" class="text-gray-600 hover:text-blue-600 font-medium transition hidden md:block">Dashboard</a>
                        
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-full bg-white/50 hover:bg-red-50 text-red-500 font-semibold transition border border-red-100 text-sm">
                                Keluar
                            </button>
                        </form>
                    </div>
                @else
                    <a href="/login" class="text-gray-600 hover:text-blue-600 font-medium transition">Masuk</a>
                    <a href="/register" class="px-6 py-2 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-bold shadow-lg hover:shadow-blue-300/50 hover:scale-105 transition transform">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-4">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
