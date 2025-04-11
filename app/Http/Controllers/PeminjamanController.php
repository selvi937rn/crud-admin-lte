<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
            ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
            ->join('mahasiswa', 'peminjaman.mahasiswa_id', '=', 'mahasiswa.id')
            ->select(
                'peminjaman.id',
                'peminjaman.tanggal_pinjam',
                'peminjaman.tanggal_kembali',
                'buku.nama as nama_buku',
                'buku.code as kode_buku',
                'mahasiswa.nama as nama_mahasiswa',
                'mahasiswa.nrp as nrp_mahasiswa'
            )
            ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = DB::table('buku')->get();
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('peminjaman.create', compact('buku', 'mahasiswa'));
    }

    public function store(Request $request) {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);
    
        // Ambil data buku
        $buku = DB::table('buku')->where('id', $request->buku_id)->first();
    
        // Cek stok
        if ($buku->stok < 1) {
            return redirect()->back()->withErrors(['buku_id' => 'Stok buku habis!'])->withInput();
        }
    
        // Insert peminjaman
        DB::table('peminjaman')->insert([
            'buku_id' => $request->buku_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Kurangi stok buku
        DB::table('buku')->where('id', $request->buku_id)->decrement('stok');
    
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $peminjaman = DB::table('peminjaman')->where('id', $id)->first();
        $buku = DB::table('buku')->get();
        $mahasiswa = DB::table('mahasiswa')->get();

        if (!$peminjaman) {
            abort(404);
        }

        return view('peminjaman.edit', compact('peminjaman', 'buku', 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        DB::table('peminjaman')->where('id', $id)->update([
            'buku_id' => $request->buku_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'updated_at' => now(),
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('peminjaman')->where('id', $id)->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
