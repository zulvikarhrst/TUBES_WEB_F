<!-- editbook.blade.php -->

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

    <title>JurnalKu</title>

    <style>
        body {
            background-color: #ecf3f2;
        }

        .add-form {
            width: 100vw;
            height: 100vh;
            background-color: #56b9b3;
            padding-left: 30vw;
            padding-right: 30vw;
        }

        .btn {
            width: 100%;
            padding-top: 12px;
            padding-bottom: 12px;
            border-radius: 16px;
        }

        .form-control {
            border-radius: 16px;
            border: solid 2px grey;
        }
    </style>
</head>
<body>
<div class="add-form d-flex flex-column justify-content-center">
    <h1 class="fw-bold text-light mb-4">Edit Buku</h1>
    <form method="post" action="{{ route('dashboard.updateBook', $book->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul_buku" class="form-label fs-5 text-light">Judul</label>
            <input type="text" class="form-control py-3 px-3" id="judul_buku" name="judul" placeholder="Masukkan nama buku" value="{{ $book->judul_buku }}" />
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label fs-5 text-light">ISBN</label>
            <input type="text" class="form-control py-3 px-3" id="isbn" name="isbn" placeholder="Masukkan ISBN buku" value="{{ $book->ISBN }}" />
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label fs-5 text-light">Penerbit</label>
            <input type="text" class="form-control py-3 px-3" id="penerbit" name="penerbit" placeholder="Masukkan penerbit buku" value="{{ $book->penerbit }}" />
        </div>
        <div class="mb-3">
            <label for="jumlah_halaman" class="form-label fs-5 text-light">Jumlah Halaman</label>
            <input type="text" class="form-control py-3 px-3" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukkan jumlah halaman buku" value="{{ $book->jumlah_halaman }}" />
        </div>
        <button type="submit" class="btn btn-outline-light border border-light border-3 fw-bold mt-4">
            Simpan
        </button>
    </form>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
></script>
</body>
</html>
