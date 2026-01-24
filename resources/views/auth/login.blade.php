@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Login</h2>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>
        @if ($errors->any())
            <div class="text-red-500 mb-4">{{ $errors->first() }}</div>
        @endif
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
    </form>
</div>
@endsection
