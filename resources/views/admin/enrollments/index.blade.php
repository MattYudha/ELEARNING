@extends('layouts.admin')

@section('title', 'Pendaftaran')

@section('content')
<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Tanggal</th>
                    <th>Progres</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{ optional($enrollment->user)->nm_user ?? 'User Not Found' }}</td>
                        <td>{{ $enrollment->course->title }}</td>
                        <td>{{ $enrollment->created_at->format('d M Y') }}</td>
                        <td>
                            {{-- Simple progress check: count completed lessons vs total lessons in course --}}
                            @php
                                $total = $enrollment->course->modules->flatMap->lessons->count();
                                $completed = \App\Models\LessonCompletion::where('user_id', $enrollment->user_id)
                                    ->whereIn('lesson_id', $enrollment->course->modules->flatMap->lessons->pluck('id'))
                                    ->count();
                                $percent = $total > 0 ? round(($completed / $total) * 100) : 0;
                            @endphp
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" style="width: {{ $percent }}%"></div>
                            </div>
                            <small>{{ $percent }}% Selesai</small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $enrollments->links() }}
    </div>
</div>
@endsection
