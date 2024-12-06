<?php

include("../database/koneksi.php");

// cek apakah submit sudah di tekan apa belum

if (isset($_POST["submit"])) {
    if (insert($_POST) > 0) {
        echo "<script>
            alert('Laporan berhasil ditambahkan');
            document.location.href='read.php';
        </script>";
    } else {
        echo "<script>
            alert('Laporan gagal ditambahkan');
        </script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD</title>
    <style>
        .container a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container py-2 mt-5">
        <h1 class="text-center mb-3 fw-bold">Halaman Tambah Data</h1>
        <div class="row justify-content-center">
            <div class="col-md-10 shadow-lg py-5 px-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="presiden" class="form-label">Presiden</label>
                        <input type="text" name="presiden" class="form-control" id="presiden" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="negara" class="form-label">Negara</label>
                        <input type="text" name="negara" class="form-control" id="negara" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    <button type="submit" class="btn btn-dark"><a href="read.php" class="text-light">Kembali</a></button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>