@extends('layouts.admin')

@section('title', 'Mata Kuliah')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Semua Mata Kuliah</h3>
        <div class="card-tools">
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Baru
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>
                            <span class="badge badge-{{ $course->is_published ? 'success' : 'warning' }}">
                                {{ $course->is_published ? 'Terbit' : 'Konsep' }}
                            </span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('admin.courses.edit', $course) }}">
                                <i class="fas fa-pencil-alt"></i> Ubah
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $courses->links() }}
    </div>
</div>
@endsection
