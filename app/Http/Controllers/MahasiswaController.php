<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan DB facade
use App\Models\Mahasiswa; // Jika menggunakan model Eloquent

class MahasiswaController extends Controller
{
    public function index() {
        // Ambil semua data mahasiswa
        $mahasiswa = DB::table('mahasiswa')->get(); 

        // Kirim data ke view
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create() {
        return view('mahasiswa.create');
    }

    public function store(Request $request) {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:20|unique:mahasiswa,nrp',
            'email' => 'required|email|unique:mahasiswa,email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Simpan data ke database menggunakan Query Builder
        DB::table('mahasiswa')->insert([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id) {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->first();

        // Jika tidak ditemukan, beri error 404
        if (!$mahasiswa) {
            abort(404);
        }

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($id) {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->first();

        // Jika tidak ditemukan, beri error 404
        if (!$mahasiswa) {
            abort(404);
        }

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id) {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:20|unique:mahasiswa,nrp,'.$id,
            'email' => 'required|email|unique:mahasiswa,email,'.$id,
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Update data mahasiswa berdasarkan ID
        DB::table('mahasiswa')->where('id', $id)->update([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'updated_at' => now(),
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui!');
    }
    
    public function destroy($id) {
        // Hapus data mahasiswa berdasarkan ID
        DB::table('mahasiswa')->where('id', $id)->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus!');
    }
}
