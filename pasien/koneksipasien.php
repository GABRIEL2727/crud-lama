\<?php
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$user = 'root';      // Ganti dengan username database Anda
$password = 'mysql'; // Ganti dengan password database Anda
$database = 'pasien'; // Ganti dengan nama database Anda

// Membuat koneksi
$koneksi = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Menangani operasi CRUD
if (isset($_POST['simpan'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    // Cek apakah idPasien sudah ada
    $stmt = $koneksi->prepare("SELECT * FROM pasien WHERE idPasien=?");
    $stmt->bind_param("s", $idPasien);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "ID Pasien sudah ada. Silakan gunakan ID yang berbeda.";
    } else {
        $stmt = $koneksi->prepare("INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $idPasien, $nmPasien, $jk, $alamat);
        $stmt->execute();
        header('location: pasien.php');
    }
}

if (isset($_GET['idPasien'])) {
    $idPasien = $_GET['idPasien'];
    $stmt = $koneksi->prepare("DELETE FROM pasien WHERE idPasien=?");
    $stmt->bind_param("s", $idPasien);
    $stmt->execute();
    header("location: pasien.php");
}

if (isset($_POST['edit'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $stmt = $koneksi->prepare("UPDATE pasien SET nmPasien=?, jk=?, alamat=? WHERE idPasien=?");
    $stmt->bind_param("ssss", $nmPasien, $jk, $alamat, $idPasien);
    $stmt->execute();
    header("location: pasien.php");
}


?>