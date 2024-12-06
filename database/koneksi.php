<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_wpu";

$koneksi = mysqli_connect($host, $user, $pass, $db);

function query($query)
{
    global $koneksi;
    $lemari = mysqli_query($koneksi, $query);
    $wadah = [];
    while ($baju = mysqli_fetch_assoc($lemari)) {
        $wadah[] = $baju;
    }
    return $wadah;
}

// tambah data
function insert($data)
{
    global $koneksi;
    $presiden = htmlspecialchars($data["presiden"]);
    $negara = htmlspecialchars($data["negara"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO presiden VALUES ('','$presiden', '$negara', '$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
};

// up gambar
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";

        return false;
    }

    // cek yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan gambar');
        </script>";
        return false;
    };

    // cek ukuran gambar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar  ');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;


    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
};

// delete data
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM presiden WHERE id = $id");
    return mysqli_affected_rows($koneksi);
};

// update data
function update($data)
{
    global $koneksi;
    $presiden = htmlspecialchars($data["presiden"]);
    $negara = htmlspecialchars($data["negara"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar atau tidak
    $gambar = ($_FILES['gambar']['error'] === 4) ? $gambarLama : upload();
    if (!$gambar) {
        return false;
    }


    $query = "UPDATE presiden SET 
        presiden = '$presiden', 
        negara = '$negara', 
        gambar = '$gambar' 
        WHERE id = {$data['id']}";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// search
function cari($keyword)
{
    $query = "SELECT * FROM presiden WHERE 
        presiden LIKE '%$keyword%' OR 
        negara LIKE '%$keyword%'";
    return query($query);
};
