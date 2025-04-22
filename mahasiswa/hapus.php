<?php
include "../conf.php";
if(isset($_GET['npm'])) {
    $npm = mysqli_real_escape_string($koneksi, $_GET['npm']);
    
    $cek = mysqli_query($koneksi, "SELECT * FROM krs WHERE mahasiswa_npm = '$npm'");
    if(mysqli_num_rows($cek) > 0) {
        echo "<script>
            if(confirm('Data mahasiswa ini terdapat di KRS. Menghapus data ini akan menghapus semua KRS terkait. Lanjutkan?')) {
                window.location = 'proses.php?npm=$npm&aksi=hapus';
            } else {
                window.location = 'index.php';
            }
        </script>";
    } else {
        header("Location: proses.php?npm=$npm&aksi=hapus");
    }
} else {
    header("Location: index.php");
}
?>