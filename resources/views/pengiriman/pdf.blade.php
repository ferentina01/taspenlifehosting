<!DOCTYPE html>
<html>
<head>
    <title>Data Pengiriman</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Pengiriman</h1>
    <table>
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
                <th>Berat (kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengiriman as $item)
                <tr>
                     <td>{{ $item->id }}
                    <td>{{ $item->nama_penerima }}</td>
                    <td>{{ $item->nama_instansi }}</td>
                    <td>{{ $item->alamat_penerima }}</td>
                    <td>{{ $item->no_tlp }}</td>
                    <td>{{ $item->jenis_barang }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->pic }}</td>
                    <td>{{ $item->berat }} kg</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>