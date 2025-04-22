<?php
include "../conf.php";

if(isset($_GET['kodeMK'])) {
    $kodeMK = $_GET['kodeMK'];
    $query = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodeMK = '$kodeMK'");
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
    <title>Edit Matkul</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Matkul</h1>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="proses.php" method="post">
                    <input type="hidden" name="aksi" value="edit">
                    <input type="hidden" name="kodeMK_lama" value="<?= $data['kodeMK'] ?>">
                    
                    <div class="mb-3">
                        <label for="kodeMK" class="form-label">kodeMK</label>
                        <input type="text" class="form-control" id="kodeMK" name="kodeMK" maxlength="6" value="<?= $data['kodeMK'] ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_sks" class="form-label">jumlah_sks</label>
                        <textarea class="form-control" id="jumlah_sks" name="jumlah_sks" rows="3"><?= $data['jumlah_sks'] ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>