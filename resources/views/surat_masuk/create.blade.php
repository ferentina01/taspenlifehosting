@extends('layouts.app')

@section('content')
<form action="{{ route('surat_masuk.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="perihal" class="form-label">Perihal</label>
        <input type="text" class="form-control" id="perihal" name="perihal" required>
    </div>
    <div class="mb-3">
        <label for="kurir" class="form-label">Kurir</label>
        <input type="text" class="form-control" id="kurir" name="kurir" required>
    </div>
    <div class="mb-3">
        <label for="up" class="form-label">UP</label>
        <input type="text" class="form-control" id="up" name="up" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <select class="form-select" id="keterangan" name="keterangan" required>
            <option value="Diterima">Diterima</option>
            <option value="Belum Diterima">Belum Diterima</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection