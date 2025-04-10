@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengiriman</h1>
    <form action="{{ route('pengiriman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_penerima" class="form-label">Nama Penerima</label>
            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
        </div>
        <div class="mb-3">
            <label for="nama_instansi" class="form-label">Instansi</label>
            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
        </div>
        <div class="mb-3">
            <label for="alamat_penerima" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" required>
        </div>
        <div class="mb-3">
            <label for="no_tlp" class="form-label">No. TLP</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" required>
        </div>
        <div class="mb-3">
            <label for="jenis_barang" class="form-label">Jenis Barang</label>
            <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select class="form-select" id="keterangan" name="keterangan" required>
                <option value="Yes">Yes</option>
                <option value="Reg">Reg</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pic" class="form-label">PIC</label>
            <input type="text" class="form-control" id="pic" name="pic" required>
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat (kg)</label>
            <input type="number" class="form-control" id="berat" name="berat" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection