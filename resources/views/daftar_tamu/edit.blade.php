@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Daftar Tamu</h1>
    <form action="{{ route('daftar_tamu.update', $daftarTamu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $daftarTamu->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_tamu" class="form-label">Nama Tamu</label>
            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="{{ $daftarTamu->nama_tamu }}" required>
        </div>
        <div class="mb-3">
            <label for="instansi" class="form-label">Instansi</label>
            <input type="text" class="form-control" id="instansi" name="instansi" value="{{ $daftarTamu->instansi }}" required>
        </div>
        <div class="mb-3">
            <label for="pic" class="form-label">PIC</label>
            <input type="text" class="form-control" id="pic" name="pic" value="{{ $daftarTamu->pic }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $daftarTamu->keterangan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="jam_kedatangan" class="form-label">Jam Kedatangan</label>
            <input type="time" class="form-control" id="jam_kedatangan" name="jam_kedatangan" value="{{ $daftarTamu->jam_kedatangan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection