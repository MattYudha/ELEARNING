<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::paginate(10);
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_dosen' => 'required|unique:m_dosen,kd_dosen|max:20',
            'nm_dosen' => 'required|max:132',
            'nidn_dosen' => 'required|max:20',
            'jns_klmn_dosen' => 'required|in:L,P',
            'kd_jabatan_dosen' => 'required|max:2',
            'status_dosen' => 'required|max:2',
        ], [
            'kd_dosen.required' => 'Kode Dosen wajib diisi.',
            'kd_dosen.unique' => 'Kode Dosen sudah terdaftar.',
            'kd_dosen.max' => 'Kode Dosen maksimal 20 karakter.',
            'nm_dosen.required' => 'Nama Dosen wajib diisi.',
            'nm_dosen.max' => 'Nama Dosen maksimal 132 karakter.',
            'nidn_dosen.required' => 'NIDN wajib diisi.',
            'nidn_dosen.max' => 'NIDN maksimal 20 karakter.',
            'jns_klmn_dosen.required' => 'Jenis Kelamin wajib dipilih.',
            'kd_jabatan_dosen.required' => 'Kode Jabatan wajib diisi.',
            'kd_jabatan_dosen.max' => 'Kode Jabatan maksimal 2 karakter.',
            'status_dosen.required' => 'Status Dosen wajib dipilih.',
            'status_dosen.max' => 'Status Dosen maksimal 2 karakter.',
        ]);

        Dosen::create($request->all());

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan!');
    }
}
