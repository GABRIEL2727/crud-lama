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

function getTabelPasien()
{
    $link = koneksi();
    $query= "SELECT *FROM pasien";
    $result = mysqli_query($link, $query);

    $hasil = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $hasil;
}
?>