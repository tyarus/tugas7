<?php
include "../conf.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodeMK = $_POST['matakuliah_kodeMK'];
    
    $check_query = "SELECT * FROM krs WHERE mahasiswa_npm = '$mahasiswa_npm' AND matakuliah_kodeMK = '$matakuliah_kodeMK'";
    $check_result = mysqli_query($koneksi, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>
            alert('Mata kuliah ini sudah terdaftar untuk mahasiswa yang dipilih!');
            window.location.href = 'index.php';
        </script>";
    } else {
        $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodeMK) VALUES ('$mahasiswa_npm', '$matakuliah_kodeMK')";
    
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                alert('Data KRS berhasil ditambahkan!');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menambahkan data KRS: " . mysqli_error($koneksi) . "');
                window.location.href = 'index.php';
            </script>";
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>