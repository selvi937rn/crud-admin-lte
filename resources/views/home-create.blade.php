@extends('master')

@section('title')
Halaman Create
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
          <h1>Blank Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('home.store') }}" method="POST">
          @csrf
          <div class="form-group mb-2">
              <label for="nama" class="sr-only">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mahasiswa" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="nrp" class="sr-only">NRP</label>
              <input type="text" class="form-control" name="nrp" id="nrp" placeholder="NRP" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="email" class="sr-only">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="no_hp" class="sr-only">No HP</label>
              <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP" required>
          </div>
      
          <div class="form-group mb-2">
              <label for="alamat" class="sr-only">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
          </div>
      
          <button class="btn btn-primary ms-1" type="submit">Kirim</button>
      </form>
      
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection