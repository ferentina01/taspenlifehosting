@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h1>Daftar Tamu</h1>
      <div class="d-flex justify-content-between mb-3">
        <div>
            <form action="{{ route('daftar_tamu.index') }}" method="GET" class="d-inline">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama penerima..." style="width: 300px; display: inline;">
            </form>
        </div>
        <div>
            <a href="{{ route('daftar_tamu.create') }}" class="btn btn-primary">Tambah daftar tamu</a>
            <a href="{{ route('daftar_tamu.pdf') }}" class="btn btn-success">Ekspor PDF</a>
        </div>
    </div> --}}

    <h3>Daftar Tamu</h3>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <form action="{{ route('daftar_tamu.index') }}" method="GET" class="d-inline">
                <input type="text" name="search" class="form-control" placeholder="Cari tamu..." style="width: 300px; display: inline;">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div>
            {{-- <a href="{{ route('daftar_tamu.create') }}" class="btn btn-primary">Tambah Tamu</a> --}}
            <a href="{{ route('daftar_tamu.pdf') }}" class="btn btn-success">Ekspor PDF</a>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Tamu</th>
                <th>Instansi</th>
                <th>PIC</th>
                <th>Keterangan</th>
                <th>Jam Kedatangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftarTamu as $tamu)
                <tr>
                    <td>{{ $tamu->id }}</td>
                    <td>{{ $tamu->tanggal }}</td>
                    <td>{{ $tamu->nama_tamu }}</td>
                    <td>{{ $tamu->instansi }}</td>
                    <td>{{ $tamu->pic }}</td>
                    <td>{{ $tamu->keterangan }}</td>
                    <td>{{ $tamu->jam_kedatangan }}</td>
                    <td>
                        <a href="{{ route('daftar_tamu.edit', $tamu->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('daftar_tamu.destroy', $tamu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
@endsection