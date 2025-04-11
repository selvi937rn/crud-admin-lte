@extends('master')

@section('title')
Halaman Edit Peminjaman
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
          <h1>Edit Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Peminjaman</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Data Peminjaman</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group mb-2">
            <label for="buku_id">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control" required>
              @foreach($buku as $b)
                <option value="{{ $b->id }}" {{ $peminjaman->buku_id == $b->id ? 'selected' : '' }}>
                  {{ $b->code }} - {{ $b->nama }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-2">
            <label for="mahasiswa_id">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
              @foreach($mahasiswa as $m)
                <option value="{{ $m->id }}" {{ $peminjaman->mahasiswa_id == $m->id ? 'selected' : '' }}>
                  {{ $m->nrp }} - {{ $m->nama }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-2">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
          </div>

          <div class="form-group mb-2">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" required>
          </div>

          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>

@endsection
