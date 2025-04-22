<?php
include "../conf.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Data Mahasiswa</h1>
            <div>
                <a href="tambah.php" class="btn btn-primary">Tambah Mahasiswa</a>
                <a href="../index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY npm ASC");
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    echo "<tr>";
                                    echo "<td>".$no++."</td>";
                                    echo "<td>".$row['npm']."</td>";
                                    echo "<td>".$row['nama']."</td>";
                                    echo "<td>".$row['jurusan']."</td>";
                                    echo "<td>".$row['alamat']."</td>";
                                    echo "<td>
                                        <a href='edit.php?npm=".$row['npm']."' class='btn btn-sm btn-warning'>Edit</a>
                                        <a href='hapus.php?npm=".$row['npm']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>