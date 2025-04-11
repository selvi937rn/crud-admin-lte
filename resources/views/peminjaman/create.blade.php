@extends('master')

@section('title')
Halaman Tambah Peminjaman
@endsection

@section('username')
Selvi Riska Nisa
@endsection

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Peminjaman</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Peminjaman</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
          @csrf

          <div class="form-group mb-2">
            <label for="buku_id">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control" required>
              <option value="">-- Pilih Buku --</option>
              @foreach($buku as $b)
                <option value="{{ $b->id }}">{{ $b->code }} - {{ $b->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-2">
            <label for="mahasiswa_id">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
              <option value="">-- Pilih Mahasiswa --</option>
              @foreach($mahasiswa as $m)
                <option value="{{ $m->id }}">{{ $m->nrp }} - {{ $m->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-2">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
          </div>

          <div class="form-group mb-2">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>

@endsection
