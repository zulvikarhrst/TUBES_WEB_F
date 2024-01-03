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
    <h1 class="fw-bold text-light mb-4">Tambah Buku</h1>
    <form method="post" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul_buku" class="form-label fs-5 text-light">Judul</label>
            <input type="text" class="form-control py-3 px-3" id="judul_buku" name="judul" placeholder="Masukkan nama buku" />
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label fs-5 text-light">ISBN</label>
            <input type="text" class="form-control py-3 px-3" id="isbn" name="isbn" placeholder="Masukkan ISBN buku" />
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label fs-5 text-light">Penerbit</label>
            <input type="text" class="form-control py-3 px-3" id="penerbit" name="penerbit" placeholder="Masukkan penerbit buku" />
        </div>
        <div class="mb-3">
            <label for="jumlah_halaman" class="form-label fs-5 text-light">Jumlah Halaman</label>
            <input type="number" class="form-control py-3 px-3" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukkan jumlah halaman buku" />
        </div>
        <div class="mb-3">
            <label for="file" class="form-label fs-5 text-light">Upload File</label>
            <input type="file" class="form-control py-3 px-3" id="file" name="file" placeholder="" />
        </div>
        <button type="submit" class="btn btn-outline-light border border-light border-3 fw-bold mt-4">
            Tambah
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
