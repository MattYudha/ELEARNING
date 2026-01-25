@extends('layouts.admin')

@section('title', 'Data Mahasiswa')

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
        <h3 class="card-title">List Mahasiswa</h3>
        <div class="card-tools">
            <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="mahasiswaTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $index => $mhs)
                    <tr>
                        <td>{{ $mahasiswa->firstItem() + $index }}</td>
                        <td>{{ $mhs->nim_mhs }}</td>
                        <td>{{ $mhs->nm_mhs }}</td>
                        <td>{{ $mhs->tempat_lhr_mhs }}</td>
                        <td>{{ $mhs->tgl_lhr_mhs }}</td>
                        <td>{{ $mhs->jenis_klmn_mhs == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $mhs->agama }}</td>
                        <td>{{ $mhs->alamat_mhs }}</td>
                        <td>{{ $mhs->tlp_mhs }}</td>
                        <td>{{ $mhs->kd_status_mhs == 'Y' ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>
                             <a href="{{ route('admin.mahasiswa.edit', $mhs->nim_mhs) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                             <form action="{{ route('admin.mahasiswa.destroy', $mhs->nim_mhs) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                             </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $mahasiswa->links() }}
    </div>
</div>
@endsection
