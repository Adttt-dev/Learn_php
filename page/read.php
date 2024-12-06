<?php

include("../database/koneksi.php");
$presiden = query("SELECT * FROM presiden");

// tombol cari ditekan
if(isset($_POST["cari"])){
    $presiden = cari($_POST["keyword"]);
};

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
        <h1 class="text-center mb-3 fw-bold">Halaman Read</h1>
        <div class="row justify-content-center text-center">
            <div class="col-md-6 py-2">
                <form action="" method="POST">
                    <input class="w-50 ml-5" type="text" name="keyword" autofocus placeholder="Masukkan keyword pencarian..">
                    <button class="btn btn-success" name="cari">Cari</button>
                </form>
            </div>
            <div class="col-md-6 py-2">
                <button class="btn btn-primary"><a href="tambah.php" class="text-light">Tambah Data</a></button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 shadow-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Presiden</th>
                            <th scope="col">Negara</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1 ?>
                        <?php foreach ($presiden as $pres) { ?>
                            <tr>
                                <th><?= $i ?></th>
                                <th><?= $pres["presiden"] ?></th>
                                <th><?= $pres["negara"] ?></th>
                                <td><img src="../img/<?= $pres['gambar']; ?>" width="50px"></td>
                                <td>
                                    <button type="submit" class="btn btn-warning"><a href="update.php?id=<?= $pres["id"] ?>" class="text-dark">Edit</a></button>
                                    <button type="submit" class="btn btn-danger"><a href="hapus.php?id=<?= $pres["id"] ?>" class="text-dark" onclick="return confirm('apakah anda yakin?');">Delete</a></button>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>