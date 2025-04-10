@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Tambah Daftar Tamu</h1>
        <form action="{{ route('daftar_tamu.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="nama_tamu" class="form-label">Nama Tamu</label>
                <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" required>
            </div>
            <div class="mb-3">
                <label for="instansi" class="form-label">Instansi</label>
                <input type="text" class="form-control" id="instansi" name="instansi" required>
            </div>
            <div class="mb-3">
                <label for="pic" class="form-label">PIC</label>
                <input type="text" class="form-control" id="pic" name="pic" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>
            <div class="mb-3">
                <label for="jam_kedatangan" class="form-label">Jam Kedatangan</label>
                <input type="time" class="form-control" id="jam_kedatangan" name="jam_kedatangan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
