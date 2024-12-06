<?php 
include '../database/koneksi.php';

$id = $_GET["id"];
if(hapus($id ) > 0){
    echo "<script>
        alert('Laporan berhasil dihapus');
        document.location.href='read.php';
    </script>";
} else {
    echo "<script>
        alert('Laporan gagal dihapus');
    </script>";
}
?>