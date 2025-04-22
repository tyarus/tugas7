<?php
include "../conf.php";

if(isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];
    
    if($aksi == "tambah") {
        $kodeMK = mysqli_real_escape_string($koneksi, $_POST['kodeMK']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jumlah_sks = mysqli_real_escape_string($koneksi, $_POST['jumlah_sks']);
        
        $cek = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodeMK = '$kodeMK'");
        if(mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Kode matakuliah sudah terdaftar!'); window.location='tambah.php';</script>";
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO matakuliah (kodeMK, nama, jumlah_sks) VALUES ('$kodeMK', '$nama', '$jumlah_sks')");
            
            if($query) {
                echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan'); window.location='tambah.php';</script>";
            }
        }
    }
    
    //edit data
    else if($aksi == "edit") {
        $kodeMK_lama = mysqli_real_escape_string($koneksi, $_POST['kodeMK_lama']);
        $kodeMK = mysqli_real_escape_string($koneksi, $_POST['kodeMK']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jumlah_sks = mysqli_real_escape_string($koneksi, $_POST['jumlah_sks']);
        
        // Cek kodeMK baru 
        if($kodeMK != $kodeMK_lama) {
            $cek = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodeMK = '$kodeMK'");
            if(mysqli_num_rows($cek) > 0) {
                echo "<script>alert('Kode matakuliah sudah terdaftar!'); window.location='edit.php?kodeMK=$kodeMK_lama';</script>";
                exit;
            }
        }
        
        $query = mysqli_query($koneksi, "UPDATE matakuliah SET kodeMK = '$kodeMK', nama = '$nama', jumlah_sks = '$jumlah_sks' WHERE kodeMK = '$kodeMK_lama'");
        
        if($query) {
            echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal diupdate'); window.location='edit.php?kodeMK=$kodeMK_lama';</script>";
        }
    }
}

//hapus data
if(isset($_GET['kodeMK']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $kodeMK = mysqli_real_escape_string($koneksi, $_GET['kodeMK']);
    
    $query = mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodeMK = '$kodeMK'");

    if($query) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location='index.php';</script>";
    }
}

header("Location: index.php");
?>