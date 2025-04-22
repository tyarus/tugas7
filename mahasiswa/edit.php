<?php
include "../conf.php";

if(isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
    $data = mysqli_fetch_assoc($query);
    if(!$data) {
        echo "<script>alert('Data tidak ditemukan'); window.location='index.php';</script>";
    }
} else {
    echo "<script>window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Mahasiswa</h1>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="proses.php" method="post">
                    <input type="hidden" name="aksi" value="edit">
                    <input type="hidden" name="npm_lama" value="<?= $data['npm'] ?>">
                    
                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm" maxlength="13" value="<?= $data['npm'] ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?= $data['nama'] ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika" <?= ($data['jurusan'] == 'Teknik Informatika') ? 'selected' : '' ?>>Teknik Informatika</option>
                            <option value="Sistem Operasi" <?= ($data['jurusan'] == 'Sistem Operasi') ? 'selected' : '' ?>>Sistem Operasi</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data['alamat'] ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>