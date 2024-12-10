<?php
function koneksi()
{
    $host = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "pasien";

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $koneksi;
}

function getTabelDokter()
{
    $link = koneksi();
    $query = "SELECT * FROM dokter";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($link));
    }

    $hasil = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Menutup koneksi
    mysqli_close($link);

    return $hasil;
}
?>