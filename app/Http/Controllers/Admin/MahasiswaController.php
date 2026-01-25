<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:m_mhs,nim_mhs|max:100',
            'prodi' => 'required',
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|max:30',
            'alamat' => 'required',
            'telpon' => 'required|max:15',
            'status' => 'required',
        ]);

        Mahasiswa::create([
            'nim_mhs' => $request->nim,
            'kd_prodi' => $request->prodi,
            'nm_mhs' => $request->nama,
            'tempat_lhr_mhs' => $request->tempat_lahir,
            'tgl_lhr_mhs' => $request->tanggal_lahir,
            'jenis_klmn_mhs' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat_mhs' => $request->alamat,
            'tlp_mhs' => $request->telpon,
            'kd_status_mhs' => $request->status, // Y/N assumed to map to code
            'tgl_msk_mhs' => now(),
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('nim_mhs', $id)->firstOrFail();
        $prodi = Prodi::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|max:100|unique:m_mhs,nim_mhs,'.$id.',nim_mhs',
            'prodi' => 'required',
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|max:30',
            'alamat' => 'required',
            'telpon' => 'required|max:15',
            'status' => 'required',
        ]);

        $mahasiswa = Mahasiswa::where('nim_mhs', $id)->firstOrFail();
        
        $mahasiswa->update([
            'nim_mhs' => $request->nim,
            'kd_prodi' => $request->prodi,
            'nm_mhs' => $request->nama,
            'tempat_lhr_mhs' => $request->tempat_lahir,
            'tgl_lhr_mhs' => $request->tanggal_lahir,
            'jenis_klmn_mhs' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat_mhs' => $request->alamat,
            'tlp_mhs' => $request->telpon,
            'kd_status_mhs' => $request->status,
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('nim_mhs', $id)->firstOrFail();
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
