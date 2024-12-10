<!DOCTYPE html>
<html>
<head>
    <title>My App | Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit Data Pasien</h3>
                <?php
                // Include the database connection
                include 'koneksipasien.php';

                // Check if 'edit' parameter exists in the URL
                if (isset($_GET['id'])) {
                    $idPasien = $_GET['id']; // Mendapatkan ID pasien dari URL
    $panggil = $koneksi->query("SELECT * FROM pasien WHERE idPasien='$idPasien'");
                    // Check if the record exists
                    if ($panggil->num_rows > 0) {
                        // Loop through the results
                        while ($row = $panggil->fetch_assoc()) {
                ?>
                <form action="koneksipasien.php" method="POST">
                    <div class="form-group">
                        <label for="idPasien">ID Pasien</label>
                        <input type="text" class="form-control mb-3" name="idPasien" placeholder="ID Pasien" value="<?= $row['idPasien'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmPasien">Nama Pasien</label>
                        <input type="text" class="form-control mb-3" name="nmPasien" placeholder="Nama Pasien" value="<?= $row['nmPasien'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?php if ($row['jk'] == "Perempuan") echo "checked"; ?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jk" value="Laki-laki" <?php if ($row['jk'] == "Laki-laki") echo "checked"; ?>>
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" placeholder="Alamat"><?= $row['alamat'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="edit" value="Simpan" class="form-control btn btn-primary">
                    </div>
                </form>
                <?php
                        }
                    } else {
                        // Display an error message if no record is found
                        echo "<div class='alert alert-danger'>Data pasien tidak ditemukan.</div>";
                    }
                } else {
                    // Display an error message if the 'edit' parameter is not provided
                    echo "<div class='alert alert-danger'>ID pasien tidak diberikan.</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
