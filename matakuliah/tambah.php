<?php
include "../conf.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Matakuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tambah Matakuliah</h1>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="proses.php" method="post">
                    <input type="hidden" name="aksi" value="tambah">
                    
                    <div class="mb-3">
                        <label for="kodeMK" class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" id="kodeMK" name="kodeMK" maxlength="6" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                        <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" min="1" max="6" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>