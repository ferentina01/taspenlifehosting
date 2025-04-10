
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pengiriman</h1>

    <div class="d-flex justify-content-between mb-2">
        <div>
            <form action="{{ route('pengiriman.index') }}" method="GET" class="d-inline">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama penerima..." style="width: 300px; display: inline;">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div>
            <a href="{{ route('pengiriman.create') }}" class="btn btn-primary">Tambah Pengiriman</a>
            <a href="{{ route('pengiriman.pdf') }}" class="btn btn-success">Ekspor PDF</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penerima</th>
                <th>Instansi</th>
                <th>Alamat</th>
                <th>No. TLP</th>
                <th>Jenis Barang</th>
                <th>Keterangan</th>
                <th>PIC</th>
                <th>Berat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($pengiriman->isEmpty())
                <tr>
                    <td colspan="10" class="text-center">Tidak ada hasil pencarian.</td>
                </tr>
            @else
                @foreach($pengiriman as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_penerima }}</td>
                        <td>{{ $item->nama_instansi }}</td>
                        <td>{{ $item->alamat_penerima }}</td>
                        <td>{{ $item->no_tlp }}</td>
                        <td>{{ $item->jenis_barang }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->pic }}</td>
                        <td>{{ $item->berat }} kg</td>
                        <td>
                            <a href="{{ route('pengiriman.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pengiriman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pengiriman</h3>

    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
        <form action="{{ route('pengiriman.index') }}" method="GET" class="d-inline mb-2 mb-md-0">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Pengiriman...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <div>
            <a href="{{ route('pengiriman.create') }}" class="btn btn-primary">Tambah Pengiriman</a>
            <a href="{{ route('pengiriman.pdf') }}" class="btn btn-success">Ekspor PDF</a>
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
                <th>Nama Penerima</th>
                <th>Instansi</th>
                <th>Alamat</th>
                <th>No. TLP</th>
                <th>Jenis Barang</th>
                <th>Keterangan</th>
                <th>PIC</th>
                <th>Berat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($pengiriman->isEmpty())
                <tr>
                    <td colspan="10" class="text-center">Tidak ada hasil pencarian.</td>
                </tr>
            @else
                @foreach($pengiriman as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_penerima }}</td>
                        <td>{{ $item->nama_instansi }}</td>
                        <td>{{ $item->alamat_penerima }}</td>
                        <td>{{ $item->no_tlp }}</td>
                        <td>{{ $item->jenis_barang }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->pic }}</td>
                        <td>{{ $item->berat }} kg</td>
                        <td>
                            <a href="{{ route('pengiriman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pengiriman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection