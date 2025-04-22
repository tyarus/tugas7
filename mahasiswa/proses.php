<?php
include "../conf.php";

if(isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];
    
    // Proses tambah data
    if($aksi == "tambah") {
        $npm = mysqli_real_escape_string($koneksi, $_POST['npm']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        
        // Cek apakah NPM sudah ada
        $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
        if(mysqli_num_rows($cek) > 0) {
            echo "<script>alert('NPM sudah terdaftar!'); window.location='tambah.php';</script>";
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')");
            
            if($query) {
                echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan'); window.location='tambah.php';</script>";
            }
        }
    }
    
    // Proses edit data
    else if($aksi == "edit") {
        $npm_lama = mysqli_real_escape_string($koneksi, $_POST['npm_lama']);
        $npm = mysqli_real_escape_string($koneksi, $_POST['npm']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        
        // Cek apakah NPM baru sudah ada jika NPM diubah
        if($npm != $npm_lama) {
            $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
            if(mysqli_num_rows($cek) > 0) {
                echo "<script>alert('NPM sudah terdaftar!'); window.location='edit.php?npm=$npm_lama';</script>";
                exit;
            }
        }
        
        $query = mysqli_query($koneksi, "UPDATE mahasiswa SET npm = '$npm', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' WHERE npm = '$npm_lama'");
        
        if($query) {
            echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal diupdate'); window.location='edit.php?npm=$npm_lama';</script>";
        }
    }
}

// Proses hapus data
if(isset($_GET['npm']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $npm = mysqli_real_escape_string($koneksi, $_GET['npm']);
    
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm = '$npm'");
    
    if($query) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location='index.php';</script>";
    }
}

// Redirect jika diakses langsung
header("Location: index.php");
?>