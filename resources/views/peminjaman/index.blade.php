@extends('master')

@section('title')
Halaman Buku
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
          <h1>Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Buku</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Buku</h3>
        <a href="{{ route('buku.create') }}" class="btn btn-success float-right">Tambah Buku</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Nama Buku</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($buku as $bk)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $bk->code }}</td>
              <td>{{ $bk->nama }}</td>
              <td>{{ $bk->stok }}</td>
              <td>
                <a href="{{ route('buku.edit', $bk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('buku.destroy', $bk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection
