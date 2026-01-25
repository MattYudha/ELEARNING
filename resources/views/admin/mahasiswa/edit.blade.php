@extends('layouts.admin')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Edit Mahasiswa</h3>
    </div>
    
    <form action="{{ route('admin.mahasiswa.update', $mahasiswa->nim_mhs) }}" method="POST">
        @csrf
        @method('PUT')
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
                        <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim_mhs) }}" placeholder="Enter NIM" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Prodi</label>
                        <select name="prodi" class="form-control">
                            <option value="">Pilih Kode Prodi</option>
                            @foreach($prodi as $p)
                                <option value="{{ $p->kd_prodi }}" {{ old('prodi', $mahasiswa->kd_prodi) == $p->kd_prodi ? 'selected' : '' }}>
                                    {{ $p->nm_prodi }} ({{ $p->kd_prodi }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nm_mhs) }}" placeholder="Enter Name" required>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $mahasiswa->tempat_lhr_mhs) }}" placeholder="Enter Tempat Lahir" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $mahasiswa->tgl_lhr_mhs) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $mahasiswa->jenis_klmn_mhs) == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $mahasiswa->jenis_klmn_mhs) == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label">P</label>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ old('agama', $mahasiswa->agama) }}" placeholder="Enter Agama" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Enter Alamat">{{ old('alamat', $mahasiswa->alamat_mhs) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" name="telpon" class="form-control" value="{{ old('telpon', $mahasiswa->tlp_mhs) }}" placeholder="Enter Telpon" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Y" {{ old('status', $mahasiswa->kd_status_mhs) == 'Y' ? 'checked' : '' }}>
                            <label class="form-check-label">Y</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="N" {{ old('status', $mahasiswa->kd_status_mhs) == 'N' ? 'checked' : '' }}>
                            <label class="form-check-label">N</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
