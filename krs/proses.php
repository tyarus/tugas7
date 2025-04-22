<?php
include "../conf.php";

function clean_input($data) {
    global $connection;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'tambah') {
        // Ambil dan bersihkan data dari form
        $mahasiswa_npm = clean_input($_POST['mahasiswa_npm']);
        $matakuliah_kodeMK = clean_input($_POST['matakuliah_kodeMK']);
        
        // Cek data 
        $check_query = "SELECT * FROM krs WHERE mahasiswa_npm = '$mahasiswa_npm' AND matakuliah_kodeMK = '$matakuliah_kodeMK'";
        $check_result = mysqli_query($connection, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            $_SESSION['error'] = "Mata kuliah ini sudah terdaftar untuk mahasiswa yang dipilih!";
        } else {
            $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodeMK) VALUES ('$mahasiswa_npm', '$matakuliah_kodeMK')";
            if (mysqli_query($connection, $query)) {
                $_SESSION['success'] = "Data KRS berhasil ditambahkan!";
            } else {
                $_SESSION['error'] = "Gagal menambahkan data KRS: " . mysqli_error($connection);
            }
        }
    }
    
    elseif ($action == 'hapus' && isset($_POST['id'])) {
        $id = clean_input($_POST['id']);
        $query = "DELETE FROM krs WHERE id = $id";
        if (mysqli_query($connection, $query)) {
            $_SESSION['success'] = "Data KRS berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus data KRS: " . mysqli_error($connection);
        }
    }
    
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>