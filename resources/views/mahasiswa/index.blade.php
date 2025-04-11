@extends('master')

@section('title')
Halaman Mahasiswa
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
          <h1>Data Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Mahasiswa</h3>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-success float-right">Tambah Mahasiswa</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NRP</th>
              <th>Kelas</th>
              <th>Email</th>
              <th>No HP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($mahasiswa as $mhs)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $mhs->nama }}</td>
              <td>{{ $mhs->nrp }}</td>
              <td>{{ $mhs->kelas }}</td>
              <td>{{ $mhs->email }}</td>
              <td>{{ $mhs->no_hp }}</td>
              <td>
                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
