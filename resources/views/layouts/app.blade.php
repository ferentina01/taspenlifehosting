<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Layanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Link to the CSS file -->

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark w-100">
        <a class="navbar-brand" href="{{ route('login') }}">
            <img src="{{ asset('images/taspen_logo.png') }}" alt="" style="font-color">
            Layanan
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('surat_masuk.index') }}">Surat Masuk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('daftar_tamu.index') }}">Daftar Tamu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pengiriman.index') }}">Pengiriman</a></li>
                
                <!-- Cek apakah pengguna sudah login -->
                @if (Auth::check())
                    <li class="nav-item">
                        <!-- Form untuk Logout -->
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: white;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endif
                <!-- Akhir dari pengecekan status autentikasi -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
