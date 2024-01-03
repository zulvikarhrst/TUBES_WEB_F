<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />

    <style>
        body {
            background-color: #ecf3f2;
        }

        .navbar {
            background-color: #56b9b3;
        }

        #pageTitle {
            color: #56b9b3;
            margin-top: 4rem;
        }

        #btnLogout {
            border-radius: 8px;
        }

        #table-container {
            background-color: white;
            width: 90vw;
            border-radius: 16px;
        }

        .table-title {
            color: #56b9b3;
        }
    </style>

    <title>JurnalKu</title>
</head>
<body>
{{--<nav class="navbar navbar-expand-lg navbar-light px-4">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand fw-bold text-light" href="#">JurnalKu</a>--}}
{{--        <button--}}
{{--            class="navbar-toggler"--}}
{{--            type="button"--}}
{{--            data-bs-toggle="collapse"--}}
{{--            data-bs-target="#navbarNavAltMarkup"--}}
{{--            aria-controls="navbarNavAltMarkup"--}}
{{--            aria-expanded="false"--}}
{{--            aria-label="Toggle navigation"--}}
{{--        >--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div--}}
{{--            class="collapse navbar-collapse justify-content-center"--}}
{{--            id="navbarNavAltMarkup"--}}
{{--        >--}}
{{--            <div class="navbar-nav">--}}
{{--                <a class="nav-link text-light" href="#">Home</a>--}}
{{--                <a class="nav-link text-light" href="#">Book</a>--}}
{{--                <a class="nav-link text-light" href="#">Journal</a>--}}
{{--                <a class="nav-link text-light" href="#">Article</a>--}}
{{--                <a class="nav-link text-light" href="#">Dashboard</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button id="btnLogout" class="btn btn-danger px-3">Logout</button>--}}
{{--    </div>--}}
{{--</nav>--}}
<nav class="navbar navbar-expand-lg navbar-light px-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="#">JurnalKu</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarNavAltMarkup"
        >
            <div class="navbar-nav">
                <a class="nav-link text-light" href="{{ route('home') }}">Home</a>
                <a class="nav-link text-light" href="{{ route('books.index') }}">Books</a>
                <a class="nav-link text-light" href="{{ route('journals.index') }}">Journals</a>
                <a class="nav-link text-light" href="{{ route('articles.index') }}">Articles</a>
                <a class="nav-link text-light" href="{{ route('dashboard.index') }}">Dashboard</a>

            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<h1 id="pageTitle" class="fw-bold text-center">Book Page</h1>
<div
    id="table-container"
    class="d-flex flex-column justify-content-center mt-4 mx-auto p-4 shadow-sm text-center"
>
    <table class="table mx-auto">
        <thead>
        <tr>
            <th scope="col" class="table-title">Judul</th>
            <th scope="col" class="table-title">Penulis</th>
            <th scope="col" class="table-title">ISBN</th>
            <th scope="col" class="table-title">Penerbit</th>
            <th scope="col" class="table-title">Jumlah halaman</th>
            <th scope="col" class="table-title">Download</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->judul_buku }}</td>
                <td>{{ $book->penulis }}</td>
                <td>{{ $book->ISBN }}</td>
                <td>{{ $book->penerbit }}</td>
                <td>{{ $book->jumlah_halaman }}</td>
                <td>
                    <a href="/storage/{{ $book->file_path }}" class="btn btn-warning me-2 text-light">
                        <img src="../../assets/download.svg" alt="" srcset="">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
></script>
</body>
</html>
