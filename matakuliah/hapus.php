<?php
include "../conf.php";
if(isset($_GET['kodeMK'])) {
    $kodeMK = mysqli_real_escape_string($koneksi, $_GET['kodeMK']);
    
    $cek = mysqli_query($koneksi, "SELECT * FROM krs WHERE matakuliah_kodeMK = '$kodeMK'");
    if(mysqli_num_rows($cek) > 0) {
        echo "<script>
            if(confirm('Data mahasiswa ini terdapat di KRS. Menghapus data ini akan menghapus semua KRS terkait. Lanjutkan?')) {
                window.location = 'proses.php?kodeMK=$kodeMK&aksi=hapus';
            } else {
                window.location = 'index.php';
            }
        </script>";
    } else {
        header("Location: proses.php?kodeMK=$kodeMK&aksi=hapus");
    }
} else {
    header("Location: index.php");
}
?>