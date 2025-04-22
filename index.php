<?php
include "conf.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sistem Informasi Akademik</h1>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Mahasiswa</h5>
                        <a href="mahasiswa/index.php" class="btn btn-primary">Kelola Mahasiswa</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Matakuliah</h5>
                        <a href="matakuliah/index.php" class="btn btn-primary">Kelola Matakuliah</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data KRS</h5>
                        <a href="krs/index.php" class="btn btn-primary">Kelola KRS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>