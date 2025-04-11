@extends('master')

@section('title')
Halaman Peminjaman
@endsection

@section('username')
Selvi Riska Nisa
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Peminjaman</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Peminjaman</h3>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-success float-right">Tambah Peminjaman</a>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Buku</th>
              <th>Nama Mahasiswa</th>
              <th>NRP</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($peminjaman as $pmj)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pmj->nama_buku }}</td>
              <td>{{ $pmj->nama_mahasiswa }}</td>
              <td>{{ $pmj->nrp_mahasiswa }}</td>
              <td>{{ $pmj->tanggal_pinjam }}</td>
              <td>{{ $pmj->tanggal_kembali ?? '-' }}</td>
              <td>
                <a href="{{ route('peminjaman.edit', $pmj->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('peminjaman.destroy', $pmj->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            @if($peminjaman->isEmpty())
              <tr>
                <td colspan="7" class="text-center">Belum ada data peminjaman.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection
