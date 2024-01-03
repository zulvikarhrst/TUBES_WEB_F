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
            width: 100%;
            height: 100%;
            background-color: #56b9b3;
            padding-left: 30vw;
            padding-right: 30vw;
        }

        .btn {
            display: block;
            width: 100%;
            padding-top: 12px;
            padding-bottom: 12px;
            border-radius: 16px;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 16px;
            border: solid 2px grey;
        }
    </style>
</head>
<body>
<div class="add-form d-flex flex-column justify-content-center">
    <h1 class="fw-bold text-light mb-4">Tambah Jurnal</h1>
    <form method="post" action="{{ route('dashboard.storejournal') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul_artikel" class="form-label fs-5 text-light">Judul</label>
            <input type="text" class="form-control py-3 px-3" id="judul_artikel" name="judul_artikel" placeholder="Masukkan Judul " />
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label fs-5 text-light">Penulis</label>
            <input type="text" class="form-control py-3 px-3" id="penulis" name="penulis" placeholder="Masukkan penulis " />
        </div>
        <div class="mb-3">
            <label for="nama_jurnal" class="form-label fs-5 text-light">Nama Jurnal</label>
            <input type="text" class="form-control py-3 px-3" id="nama_jurnal" name="nama_jurnal" placeholder="Masukkan Nama Jurnal" />
        </div>
        <div class="mb-3">
            <label for="volume_jurnal" class="form-label fs-5 text-light">Volume Jurnal</label>
            <input type="text" class="form-control py-3 px-3" id="volume_jurnal" name="volume_jurnal" placeholder="Masukkan Volume Jurnal" />
        </div>
        <div class="mb-3">
            <label for="nomor_jurnal" class="form-label fs-5 text-light">Nomor Jurnal</label>
            <input type="text" class="form-control py-3 px-3" id="nomor_jurnal" name="nomor_jurnal" placeholder="Masukkan Nomor Jurnal" />
        </div>
        <div class="mb-3">
            <label for="halaman" class="form-label fs-5 text-light">Halaman Jurnal</label>
            <input type="text" class="form-control py-3 px-3" id="halaman" name="halaman" placeholder="Masukkan Halaman Jurnal" />
        </div>
        <div class="mb-3">
            <label for="ISSN" class="form-label fs-5 text-light">ISSN</label>
            <input type="text" class="form-control py-3 px-3" id="ISSN" name="ISSN" placeholder="Masukkan ISSN" />
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label fs-5 text-light">Penerbit</label>
            <input type="text" class="form-control py-3 px-3" id="penerbit" name="penerbit" placeholder="Masukkan Penerbt" />
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
