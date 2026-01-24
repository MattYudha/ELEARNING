@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
    <p class="mb-4">You are logged in as a Student.</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded">
            <h3 class="font-bold">My Enrollments</h3>
            <p class="text-2xl">{{ Auth::user()->enrollments()->count() }}</p>
        </div>
        <div class="bg-green-100 p-4 rounded">
            <h3 class="font-bold">Completed Lessons</h3>
            <p class="text-2xl">{{ Auth::user()->completedLessons()->count() }}</p>
        </div>
    </div>
</div>
