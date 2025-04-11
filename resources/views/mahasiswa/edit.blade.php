@extends('master')

@section('title')
Halaman Edit
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
          <h1>Edit Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Mahasiswa</li>
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
        <h3 class="card-title">Edit Data Mahasiswa</h3>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
          @csrf
          @method('PUT') {{-- Tambahkan method PUT --}}
          
          <div class="form-group mb-2">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" value="{{ $mahasiswa->nama }}" required>
          </div>

          <div class="form-group mb-2">
              <label for="nrp">NRP</label>
              <input type="text" class="form-control" name="nrp" id="nrp" value="{{ $mahasiswa->nrp }}" required>
          </div>

          <div class="form-group mb-2">
              <label for="kelas">Kelas</label>
              <input type="text" class="form-control" name="kelas" id="kelas" value="{{ $mahasiswa->kelas }}" required>
          </div>

          <div class="form-group mb-2">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ $mahasiswa->email }}" required>
          </div>

          <div class="form-group mb-2">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ $mahasiswa->no_hp }}" required>
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
