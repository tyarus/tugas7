<?php
include "../conf.php";
$query = "SELECT k.id, m.npm, m.nama as nama_mhs, mk.kodeMK, mk.nama as nama_mk, mk.jumlah_sks 
          FROM krs k
          JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
          JOIN matakuliah mk ON k.matakuliah_kodeMK = mk.kodeMK
          ORDER BY m.nama, mk.nama";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}

$data_krs = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data_krs[] = $row;
}

$query_mhs = "SELECT npm, nama FROM mahasiswa ORDER BY nama";
$result_mhs = mysqli_query($koneksi, $query_mhs);

$query_mk = "SELECT kodeMK, nama, jumlah_sks FROM matakuliah ORDER BY nama";
$result_mk = mysqli_query($koneksi, $query_mk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen Kartu Rencana Studi (KRS)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Manajemen Kartu Rencana Studi (KRS)</h1>
            <div>
                <a href="../index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h2>Tambah KRS Baru</h2>
            </div>
            <div class="card-body">
                <form action="tambah.php" method="post">
                    <div class="mb-3">
                        <label for="mahasiswa" class="form-label">Mahasiswa:</label>
                        <select name="mahasiswa_npm" id="mahasiswa" class="form-select" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            <?php while ($mhs = mysqli_fetch_assoc($result_mhs)) { ?>
                                <option value="<?php echo $mhs['npm']; ?>">
                                    <?php echo $mhs['npm'] . ' - ' . $mhs['nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="matakuliah" class="form-label">Mata Kuliah:</label>
                        <select name="matakuliah_kodeMK" id="matakuliah" class="form-select" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            <?php while ($mk = mysqli_fetch_assoc($result_mk)) { ?>
                                <option value="<?php echo $mk['kodeMK']; ?>">
                                    <?php echo $mk['kodeMK'] . ' - ' . $mk['nama'] . ' (' . $mk['jumlah_sks'] . ' SKS)'; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah KRS</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Daftar KRS</h2>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data_krs)) { ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data KRS.</td>
                            </tr>
                        <?php } else {
                            $no = 1;
                            foreach ($data_krs as $krs) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $krs['npm']; ?></td>
                                    <td><?php echo $krs['nama_mhs']; ?></td>
                                    <td><?php echo $krs['kodeMK']; ?></td>
                                    <td><?php echo $krs['nama_mk']; ?></td>
                                    <td><?php echo $krs['jumlah_sks']; ?></td>
                                    <td>
                                        <a href="hapus.php?id=<?php echo $krs['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
