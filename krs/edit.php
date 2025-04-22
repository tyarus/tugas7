<?php
include "../conf.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT k.id, k.mahasiswa_npm, k.matakuliah_kodeMK, m.nama as nama_mhs, mk.nama as nama_mk
              FROM krs k
              JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
              JOIN matakuliah mk ON k.matakuliah_kodeMK = mk.kodeMK
              WHERE k.id = $id";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $krs = mysqli_fetch_assoc($result);
    } else {
        echo "<script>
            alert('Data KRS tidak ditemukan!');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

$query_mhs = "SELECT npm, nama FROM mahasiswa ORDER BY nama";
$result_mhs = mysqli_query($connection, $query_mhs);

$query_mk = "SELECT kodeMK, nama, jumlah_sks FROM matakuliah ORDER BY nama";
$result_mk = mysqli_query($connection, $query_mk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit KRS</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Data KRS</h1>
        
        <div class="form-container">
            <form action="proses.php" method="post">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo $krs['id']; ?>">
                
                <div class="form-group">
                    <label for="mahasiswa">Mahasiswa:</label>
                    <select name="mahasiswa_npm" id="mahasiswa" required>
                        <?php while ($mhs = mysqli_fetch_assoc($result_mhs)) { ?>
                            <option value="<?php echo $mhs['npm']; ?>" <?php echo ($mhs['npm'] == $krs['mahasiswa_npm']) ? 'selected' : ''; ?>>
                                <?php echo $mhs['npm'] . ' - ' . $mhs['nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="matakuliah">Mata Kuliah:</label>
                    <select name="matakuliah_kodeMK" id="matakuliah" required>
                        <?php while ($mk = mysqli_fetch_assoc($result_mk)) { ?>
                            <option value="<?php echo $mk['kodeMK']; ?>" <?php echo ($mk['kodeMK'] == $krs['matakuliah_kodeMK']) ? 'selected' : ''; ?>>
                                <?php echo $mk['kodeMK'] . ' - ' . $mk['nama'] . ' (' . $mk['jumlah_sks'] . ' SKS)'; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="index.php" class="btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>