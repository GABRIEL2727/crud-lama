<?php
$koneksi = new mysqli('localhost', 'root', 'mysql', 'pasien') 
or die(mysqli_error($koneksi));

if (isset($_POST['simpan'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    // Make sure idKunjungan is unique or use auto-increment in the database
    $koneksi->query("INSERT INTO Kunjungan (idKunjungan, idPasien, idDokter, tanggal, keluhan) 
                     VALUES ('$idKunjungan', '$idPasien', '$idDokter', '$tanggal', '$keluhan')");
    header('Location: kunjungan.php');
}

if (isset($_GET['idKunjungan'])) {
    $idKunjungan = $_GET['idKunjungan'];
    $koneksi->query("DELETE FROM Kunjungan WHERE idKunjungan = '$idKunjungan'");
    header("Location: kunjungan.php");
}

if (isset($_POST['edit'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    // Use WHERE clause to specify which record to update
    $koneksi->query("UPDATE Kunjungan 
                     SET idPasien='$idPasien', idDokter='$idDokter', tanggal='$tanggal', keluhan='$keluhan'
                     WHERE idKunjungan='$idKunjungan'");
    header("Location: kunjungan.php");
}
?>
