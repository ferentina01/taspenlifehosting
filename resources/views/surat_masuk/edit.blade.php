@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Surat Masuk</h1>
    <form action="{{ route('surat_masuk.update', $suratMasuk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="perihal" class="form-label">Perihal</label>
            <input type="text" class="form-control" id="perihal" name="perihal" value="{{ $suratMasuk->perihal }}" required>
        </div>
        <div class="mb-3">
            <label for="kurir" class="form-label">Kurir</label>
            <input type="text" class="form-control" id="kurir" name="kurir" value="{{ $suratMasuk->kurir }}" required>
        </div>
        <div class="mb-3">
            <label for="up" class="form-label">UP</label>
            <input type="text" class="form-control" id="up" name="up" value="{{ $suratMasuk->up }}" required>
        </div>

        <div class="mb-3">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <select class="form-select" id="keterangan" name="keterangan" required>
                <option value="Diterima" {{ $suratMasuk->keterangan == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Belum Diterima" {{ $suratMasuk->keterangan == 'Belum Diterima' ? 'selected' : '' }}>Belum Diterima</option>
            </select>


        </div>

        <div class="mb-3">
    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ \Carbon\Carbon::parse($suratMasuk->tanggal_masuk)->format('Y-m-d') }}" required>
</div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
