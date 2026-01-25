@extends('layouts.admin')

@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Mahasiswa</h3>
    </div>
    
    <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
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
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" placeholder="Enter NIM" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Prodi</label>
                        <select name="prodi" class="form-control">
                            <option value="">Pilih Kode Prodi</option>
                            @foreach($prodi as $p)
                                <option value="{{ $p->kd_prodi }}">{{ $p->nm_prodi }} ({{ $p->kd_prodi }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" placeholder="Enter Name" required>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Enter Tempat Lahir" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="L">
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
                            <label class="form-check-label">P</label>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="Enter Agama" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Enter Alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" name="telpon" class="form-control" placeholder="Enter Telpon" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Y" checked>
                            <label class="form-check-label">Y</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="N">
                            <label class="form-check-label">N</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-info">Reset</button>
        </div>
    </form>
</div>
@endsection
