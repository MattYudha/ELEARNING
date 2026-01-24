<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 mb-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">E-Learning</a>
            <div>
                @auth
                    <a href="/dashboard" class="mr-4">My Dashboard</a>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500">Logout</button>
                    </form>
                @else
                    <a href="/login" class="mr-4">Login</a>
                    <a href="/register" class="bg-blue-500 text-white px-4 py-2 rounded">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
