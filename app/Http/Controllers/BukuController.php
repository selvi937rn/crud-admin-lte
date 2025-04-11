<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index() {
        $buku = DB::table('buku')->get();
        return view('buku.index', compact('buku'));
    }

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        $request->validate([
            'code' => 'required|string|max:20|unique:buku,code',
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        DB::table('buku')->insert([
            'code' => $request->code,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan!');
    }

    public function show($id) {
        $buku = DB::table('buku')->where('id', $id)->first();

        if (!$buku) {
            abort(404);
        }

        return view('buku.show', compact('buku'));
    }

    public function edit($id) {
        $buku = DB::table('buku')->where('id', $id)->first();

        if (!$buku) {
            abort(404);
        }

        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'code' => 'required|string|max:20|unique:buku,code,'.$id,
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        DB::table('buku')->where('id', $id)->update([
            'code' => $request->code,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'updated_at' => now(),
        ]);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy($id) {
        DB::table('buku')->where('id', $id)->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
