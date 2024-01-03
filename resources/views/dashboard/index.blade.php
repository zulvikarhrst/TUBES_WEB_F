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
            padding-bottom: 40px;
        }

        .navbar {
            background-color: #56b9b3;
        }

        #pageTitle {
            color: #56b9b3;
            margin-top: 2rem;
            margin-left: 6rem;
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

        #button-tambah {
            background-color: #56b9b3;
            max-width: fit-content;
        }
        #button-tambah-books {
            background-color: #56b9b3;
            max-width: fit-content;
        }

        .action {
            width: fit-content;
        }

        #btn-edit {
            background-color: #56b9b3;
        }
    </style>

    <title>JurnalKu</title>
</head>
<body>
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
            <ul class="navbar-nav ms-auto">
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
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

<h4 id="pageTitle" class="fw-bold">Book</h4>
<div id="table-container" class="d-flex flex-column justify-content-center mt-4 mx-auto p-4 shadow-sm">
    <table class="table mx-auto">
        <thead>
        <tr>
            <th scope="col" class="table-title">Judul</th>
            <th scope="col" class="table-title">ISBN</th>
            <th scope="col" class="table-title">Penerbit</th>
            <th scope="col" class="table-title">Jumlah halaman</th>
            <th scope="col" class="table-title"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->judul_buku }}</td>
                <td>{{ $book->ISBN }}</td>
                <td>{{ $book->penerbit }}</td>
                <td>{{ $book->jumlah_halaman }}</td>
                <td class="action">
                    <a href="{{ route('dashboard.editBook', $book->id) }}" class="btn btn-warning me-2 text-light">Edit</a>
                    <form action="{{ route('dashboard.deleteBook', $book->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
{{--                <td class="action">--}}
{{--                    <form action="{{ route('dashboard.deleteBook', $book->id) }}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    <button id="button-tambah-books" class="btn text-light fw-bold px-4" onclick="window.location.href='{{ route('dashboard.addbook') }}'">
        Tambah Buku
    </button>
</div>

<h4 id="pageTitle" class="fw-bold">Article</h4>
<div id="table-container" class="d-flex flex-column justify-content-center mt-4 mx-auto p-4 shadow-sm">
    <table class="table mx-auto">
        <thead>
        <tr>
            <th scope="col" class="table-title">Judul</th>
            <th scope="col" class="table-title">Penulis</th>
            <th scope="col" class="table-title">Seminar Konferensi Simposium</th>
            <th scope="col" class="table-title">Penyelenggara</th>
            <th scope="col" class="table-title">Waktu Seminar</th>
            <th scope="col" class="table-title">ISBN</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->judul_artikel }}</td>
                <td>{{ $article->penulis }}</td>
                <td>{{ $article->seminar_konferensi_simposium }}</td>
                <td>{{ $article->penyelenggara_seminar_konferensi_simposium }}</td>
                <td>{{ $article->waktu_pelaksanaan_seminar_konferensi_simposium }}</td>
                <td>{{ $article->ISBN_ISSN }}</td>
                <td class="action">
                    <a href="{{ route('dashboard.editArticle', $article->id) }}" class="btn btn-warning me-2 text-light">Edit</a>
                    <form action="{{ route('dashboard.deleteArticle', $article->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Bagian Articles -->
    <button id="button-tambah" class="btn text-light fw-bold px-4" onclick="window.location.href='{{ route('dashboard.addarticle') }}'">
        Tambah Artikel
    </button>

</div>

<h4 id="pageTitle" class="fw-bold">Journal</h4>
<div id="table-container" class="d-flex flex-column justify-content-center mt-4 mx-auto p-4 shadow-sm">
    <table class="table mx-auto">
        <thead>
        <tr>
            <th scope="col" class="table-title">Judul</th>
            <th scope="col" class="table-title">Penulis</th>
            <th scope="col" class="table-title">Nama Jurnal</th>
            <th scope="col" class="table-title">Volume Jurnal</th>
            <th scope="col" class="table-title">Nomor Jurnal</th>
            <th scope="col" class="table-title">Halaman</th>
            <th scope="col" class="table-title">ISSN</th>
            <th scope="col" class="table-title">Penerbit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($journals as $journal)
            <tr>
                <td>{{ $journal->judul_artikel }}</td>
                <td>{{ $journal->penulis }}</td>
                <td>{{ $journal->nama_jurnal }}</td>
                <td>{{ $journal->volume_jurnal }}</td>
                <td>{{ $journal->nomor_jurnal }}</td>
                <td>{{ $journal->halaman }}</td>
                <td>{{ $journal->ISSN }}</td>
                <td>{{ $journal->penerbit }}</td>
                <td class="action">
                    <a href="{{ route('dashboard.editJournal', $journal->id) }}" class="btn btn-warning me-2 text-light">Edit</a>
                    <form action="{{ route('dashboard.deleteJournal', $journal->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button id="button-tambah" class="btn text-light fw-bold px-4" onclick="window.location.href='{{ route('dashboard.addjournal') }}'">
        Tambah Jurnal
    </button>
</div>

{{--<div class="modal fade" id="addBookBooks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title text-light" id="exampleModalLabel">--}}
{{--                    Tambah Buku--}}
{{--                </h5>--}}
{{--                <button--}}
{{--                    type="button"--}}
{{--                    class="btn-close"--}}
{{--                    data-bs-dismiss="modal"--}}
{{--                    aria-label="Close"--}}
{{--                ></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form id="addBookForm" method="post" action="{{ route('dashboard.store') }}">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="judul_buku" class="form-label fs-5 text-dark">Judul</label>--}}
{{--                        <input type="text" class="form-control py-3 px-3" id="judul_buku" name="judul_buku" placeholder="Masukkan nama buku" />--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="ISBN" class="form-label fs-5 text-dark">ISBN</label>--}}
{{--                        <input type="text" class="form-control py-3 px-3" id="ISBN" name="ISBN" placeholder="Masukkan ISBN buku" />--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="penerbit" class="form-label fs-5 text-dark">Penerbit</label>--}}
{{--                        <input type="text" class="form-control py-3 px-3" id="penerbit" name="penerbit" placeholder="Masukkan penerbit buku" />--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="jumlah_halaman" class="form-label fs-5 text-dark">Jumlah Halaman</label>--}}
{{--                        <input type="text" class="form-control py-3 px-3" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukkan jumlah halaman buku" />--}}
{{--                    </div>--}}
{{--                    <button type="button" class="btn btn-primary" onclick="submitForm()">--}}
{{--                        Tambah--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5EmBv0vuo8h3ZE4Nz73FV9l2zbC1Rr5h3E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{--<script>--}}
{{--    function submitForm(section) {--}}
{{--        var judulBuku = document.getElementById('judul_buku').value;--}}
{{--        var isbn = document.getElementById('ISBN').value;--}}
{{--        var penerbit = document.getElementById('penerbit').value;--}}
{{--        var jumlahHalaman = document.getElementById('jumlah_halaman').value;--}}

{{--        document.getElementById('judul_buku_input').value = judulBuku;--}}
{{--        document.getElementById('isbn_input').value = isbn;--}}
{{--        document.getElementById('penerbit_input').value = penerbit;--}}
{{--        document.getElementById('jumlah_halaman_input').value = jumlahHalaman;--}}

{{--        document.getElementById('addBookForm').submit();--}}

{{--        // Mengarahkan kembali ke dashboard dengan menggantikan 'home' dengan 'dashboard.index'--}}
{{--        window.location.href = "{{ route('dashboard.index') }}";--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>
