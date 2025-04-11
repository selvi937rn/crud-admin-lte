<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan daftar data (home-index.blade.php)
    public function index()
    {
        $data = session('form_data', []); // Ambil data dari session
        return view('home-index', compact('data'));
    }



    // Menampilkan form tambah data (home-create.blade.php)
    public function create()
    {
        return view('home-create');
    }

    // Menyimpan data dari form ke session
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:20',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Ambil data lama dari session (kalau kosong, pakai array baru)
        $data = session('form_data', []);

        // Tambahkan data baru ke array
        $data[] = [
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ];

        // Simpan kembali ke session
        session(['form_data' => $data]);

        return redirect()->route('home.index')->with('success', 'Data berhasil disimpan di session!');
    }


    public function show( ) {
        // dd($nama); // Debugging: akan menampilkan isi data dan menghentikan proses
    }

    public function edit(string $id ) {

    }

    public function destroy() {

    }

    public function update() {
        
    }
}


