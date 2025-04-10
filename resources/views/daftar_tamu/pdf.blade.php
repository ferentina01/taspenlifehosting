<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tamu</title>
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
    <h1>Data Daftar Tamu</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Tamu</th>
                <th>Instansi</th>
                <th>PIC</th>
                <th>Keterangan</th>
                <th>Jam Kedatangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftarTamu as $tamu)
                <tr>
                    <td>{{ $tamu->tanggal }}</td>
                    <td>{{ $tamu->nama_tamu }}</td>
                    <td>{{ $tamu->instansi }}</td>
                    <td>{{ $tamu->pic }}</td>
                    <td>{{ $tamu->keterangan }}</td>
                    <td>{{ $tamu->jam_kedatangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>