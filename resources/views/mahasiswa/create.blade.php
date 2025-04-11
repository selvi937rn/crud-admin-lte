@extends('master')

@section('title')
Halaman Tambah Mahasiswa
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
          <h1>Tambah Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Mahasiswa</li>
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
        <h3 class="card-title">Form Tambah Mahasiswa</h3>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('mahasiswa.store') }}" method="POST">
          @csrf
          
          <div class="form-group mb-2">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="nrp">NRP</label>
              <input type="text" class="form-control" name="nrp" id="nrp" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" name="no_hp" id="no_hp" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" required>
          </div>
      
          <button class="btn btn-success" type="submit">Simpan</button>
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
