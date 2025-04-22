<?php
include "../conf.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM krs WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {

        echo "<script>
            alert('Data KRS berhasil dihapus!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data KRS: " . mysqli_error($koneksi) . "');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>