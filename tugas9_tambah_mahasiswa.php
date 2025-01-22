<?php
     session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'tedc');

    $program_Studi = $mysqli->query("Select * from studi_program");
    if (isset($_POST['nim']) && isset($_POST['nama'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $Prodi = $_POST['name'];

        $insert = $mysqli->query("INSERT INTO students(nim, nama, studi_program_id) VALUES ('$nim','$nama','$Prodi')");
        if ($insert) {
                $_SESSION['success'] = true;
                $_SESSION['message'] = 'Data Berhasil Ditambahkan';
            header("Location: Mahasiswa.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2 class="text-center"> tambah </h2>
    <form method="POST">
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Prodi</label>
        <select class="form-select" id="name" name="name" required>
        <option value="">Pilih Prodi</option>
            <?php while ($row = $program_Studi->fetch_assoc()) { ?>
            <option value="<?= $row['studi_program_id']; ?>">
                <?= $row['name']; ?>
            </option>
            <?php            } ?>
            </select>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Sumbit</button>
        <a href="Mahasiswa.php" class="btn btn-warning">Cancel</a>
            </div>
    </form>
</body>
</html>
