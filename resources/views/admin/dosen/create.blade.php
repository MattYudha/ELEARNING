@extends('layouts.admin')

@section('title', 'Tambah Dosen')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Dosen</h3>
    </div>
    
    <form action="{{ route('admin.dosen.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label>Kode Dosen</label>
                <input type="text" name="kd_dosen" class="form-control" placeholder="Enter Kode Dosen" required>
            </div>

            <div class="form-group">
                <label>Nama Dosen</label>
                <input type="text" name="nm_dosen" class="form-control" placeholder="Enter Nama Dosen" required>
            </div>

            <div class="form-group">
                <label>NIDN</label>
                <input type="text" name="nidn_dosen" class="form-control" placeholder="Enter NIDN" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jns_klmn_dosen" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kode Jabatan</label>
                <input type="text" name="kd_jabatan_dosen" class="form-control" placeholder="Enter Kode Jabatan" required>
            </div>

            <div class="form-group">
                <label>Status Dosen</label>
                 <select name="status_dosen" class="form-control">
                    <option value="A">Aktif</option>
                    <option value="C">Cuti</option>
                    <option value="K">Keluar</option>
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-info">Reset</button>
        </div>
    </form>
</div>
@endsection
