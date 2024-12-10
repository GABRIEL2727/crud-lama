<?php
$koneksi = new mysqli('localhost', 'root', 'mysql', 'pasien')
or die(mysqli_error($koneksi));

if (isset($_POST['simpan'])) {
$idDokter = $_POST['idDokter'];
$nmDokter = $_POST['nmDokter'];
$spesialisasi = $_POST['spesialisasi'];
$noTelp = $_POST['noTelp'];
$koneksi->query("INSERT INTO Dokter (idDokter, nmDokter, spesialisasi, noTelp) values ('$idDokter', '$nmDokter', '$spesialisasi', '$noTelp')");
header('location: dokter.php');
}

if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    $koneksi->query("DELETE FROM Dokter where idDokter = '$idDokter'");
    header("location:dokter.php");
    }

    if (isset($_POST['edit'])) {
        $idDokter = $_POST['idDokter'];
        $nmDokter = $_POST['nmDokter'];
        $spesialisasi = $_POST['spesialisasi'];
        $noTelp= $_POST['noTelp'];
        $koneksi->query("UPDATE Dokter SET idDokter='$idDokter', nmDokter='$nmDokter', spesialisasi='$spesialisasi', noTelp='$noTelp'");
        header("location:dokter.php");
    }
?>