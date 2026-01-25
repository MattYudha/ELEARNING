@extends('layouts.admin')

@section('title', 'Data Dosen')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Dosen</h3>
        <div class="card-tools">
            <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Dosen
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Dosen</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosen as $dsn)
                    <tr>
                        <td>{{ $dsn->kd_dosen }}</td>
                        <td>{{ $dsn->nm_dosen }}</td>
                        <td>{{ $dsn->nidn_dosen }}</td>
                        <td>{{ $dsn->jns_klmn_dosen == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $dsn->kd_jabatan_dosen }}</td>
                        <td>{{ $dsn->status_dosen }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $dosen->links() }}
    </div>
</div>
@endsection
