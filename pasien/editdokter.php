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
                <h3>Edit Data Dokter</h3>
                <?php
                include 'koneksidokter.php';
                $idDokter = $_GET['edit'];
                $panggil = $koneksi->query("SELECT * FROM Dokter WHERE idDokter='$idDokter'");
                while ($row = $panggil->fetch_assoc()) {
                ?>
                <form action="koneksidokter.php" method="POST">
                    <div class="form-group">
                        <label for="idDokter">ID Dokter</label>
                        <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID Dokter" value="<?= $row['idDokter'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmDokter">Nama Dokter</label>
                        <input type="text" class="form-control mb-3" name="nmDokter" placeholder="Nama Dokter" value="<?= $row['nmDokter'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Spesialisasi</label>
                        <input type="text" class="form-control mb-3" name="spesialisasi" placeholder="Spesialisasi" value="<?= $row['spesialisasi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="noTelp">No.Telp</label>
                        <input type="text" class="form-control mb-3" name="noTelp" placeholder="No.Telp" value="<?= $row['noTelp'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="edit" value="Simpan" class="form-control btn btn-primary">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>