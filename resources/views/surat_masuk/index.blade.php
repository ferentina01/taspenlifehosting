
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Surat Masuk</h3>

    <!-- Form Pencarian -->
    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
        <form action="{{ route('surat_masuk.index') }}" method="GET" class="d-inline mb-2 mb-md-0">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari surat ..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <div>
            <a href="{{ route('surat_masuk.create') }}" class="btn btn-primary">Tambah Surat</a>
            <a href="{{ route('surat_masuk.pdf') }}" class="btn btn-success">Ekspor PDF</a>
        </div>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Surat Masuk -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th>No</th>
                    <th>Perihal</th>
                    <th>Tanggal Masuk</th>
                    <th>UP</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suratMasuk as $index => $surat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>{{ $surat->tanggal_masuk }}</td>
                        <td>{{ $surat->up }}</td>
                        <td>
                            @if($surat->keterangan)
                                <span >Diterima</span>
                            @else
                                <span >Belum Diterima</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('surat_masuk.edit', $surat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('surat_masuk.destroy', $surat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
