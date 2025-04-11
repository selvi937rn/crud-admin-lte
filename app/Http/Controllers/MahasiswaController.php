<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:20|unique:mahasiswa,nrp',
            'kelas' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        DB::table('mahasiswa')->insert([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->first();

        if (!$mahasiswa) {
            abort(404);
        }

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:20|unique:mahasiswa,nrp,' . $id,
            'kelas' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        DB::table('mahasiswa')->where('id', $id)->update([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'updated_at' => now(),
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('mahasiswa')->where('id', $id)->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
