@extends('master')

@section('title')
Halaman Edit Buku
@endsection

@section('username')
Selvi Riska Nisa
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Buku</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Data Buku</h3>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('buku.update', $buku->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group mb-2">
              <label for="code">Kode Buku</label>
              <input type="text" class="form-control" name="code" id="code" value="{{ $buku->code }}" required>
          </div>

          <div class="form-group mb-2">
              <label for="nama">Nama Buku</label>
              <input type="text" class="form-control" name="nama" id="nama" value="{{ $buku->nama }}" required>
          </div>

          <div class="form-group mb-2">
              <label for="stok">Stok</label>
              <input type="number" class="form-control" name="stok" id="stok" value="{{ $buku->stok }}" required min="0">
          </div>

          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>

@endsection
