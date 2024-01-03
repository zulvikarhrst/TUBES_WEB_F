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
    <h1 class="fw-bold text-light mb-4">Edit Artikel</h1>
    <form method="post" action="{{ route('dashboard.updateArticle', $article->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul_artikel" class="form-label fs-5 text-light">Judul</label>
            <input type="text" class="form-control py-3 px-3" id="judul_artikel" name="judul_artikel" placeholder="Masukkan nama "  value="{{ $article->judul_artikel }}"/>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label fs-5 text-light">Penulis</label>
            <input type="text" class="form-control py-3 px-3" id="penulis" name="penulis" placeholder="Masukkan penulis " value="{{ $article->penulis }}" />
        </div>
        <div class="mb-3">
            <label for="seminar_konferensi_simposium" class="form-label fs-5 text-light">Seminar Konferensi Simposium</label>
            <input type="text" class="form-control py-3 px-3" id="seminar_konferensi_simposium" name="seminar_konferensi_simposium" placeholder="Masukkan Seminar Konferensi Simposium" value="{{ $article->seminar_konferensi_simposium }}"/>
        </div>
        <div class="mb-3">
            <label for="penyelenggara_seminar_konferensi_simposium" class="form-label fs-5 text-light">Penyelenggara</label>
            <input type="text" class="form-control py-3 px-3" id="penyelenggara_seminar_konferensi_simposium" name="penyelenggara_seminar_konferensi_simposium" placeholder="Masukkan Penyelenggara" value="{{ $article->penyelenggara_seminar_konferensi_simposium }}"/>
        </div>
        <div class="mb-3">
            <label for="waktu_pelaksanaan_seminar_konferensi_simposium" class="form-label fs-5 text-light">Waktu Seminar</label>
            <input type="date" class="form-control py-3 px-3" id="waktu_pelaksanaan_seminar_konferensi_simposium" name="waktu_pelaksanaan_seminar_konferensi_simposium" placeholder="Masukkan Waktu Seminar" value="{{ $article->waktu_pelaksanaan_seminar_konferensi_simposium }}"/>
        </div>
        <div class="mb-3">
            <label for="ISBN_ISSN" class="form-label fs-5 text-light">ISBN</label>
            <input type="text" class="form-control py-3 px-3" id="ISBN_ISSN" name="ISBN_ISSN" placeholder="Masukkan ISBN Seminar" value="{{ $article->ISBN_ISSN }}"/>
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
