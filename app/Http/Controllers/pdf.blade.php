<!DOCTYPE html>
<html>
<head>
    <title>Surat Masuk</title>
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
    <h1>Data Surat Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>Perihal</th>
                <th>Kurir</th>
                <th>UP</th>
                <th>Diterima</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratMasuk as $surat)
                <tr>
                    <td>{{ $surat->perihal }}</td>
                    <td>{{ $surat->kurir }}</td>
                    <td>{{ $surat->up }}</td>
                    <td>{{ $surat->diterima ? 'Diterima' : 'Belum Diterima' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>