
<html>
    <head>
        <title>My App | Halaman Utama</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="pasien.php" class="navbar-brand">My App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarSupportedContent" aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="controller_pasien.php" class="nav-link" aria-current="page">Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a href="controller_dokter.php" class="nav-link" aria-current="page">Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a href="controller_kunjungan.php" class="nav-link" aria-current="page">Kunjungan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Tabel dokter</h3>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col">
        <a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <table class="table table-striped table-hover table-sm">
            <tr>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>spesialis</th>
                <th>notlp</th>
                <th>Actions</th>
            </tr>
            <?php
            $no = 1;
            if (isset($listTabelDokter) && is_array($listTabelDokter)) {
                foreach ($listTabelDokter as $data) {
                    ?>
                    <tr>
                        <td><?= $data['iddokter']; ?></td>
                        <td><?= $data['nmdokter']; ?></td>
                        <td><?= $data['spesialis']; ?></td>
                        <td><?= $data['notlp']; ?></td>
                        <td>
                            <a href="editdokter.php?id=<?= $data['iddokter']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="konfirmasi.php?iddokter=<?= $data['iddokter']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data kunjungan.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
    </body>
</html>