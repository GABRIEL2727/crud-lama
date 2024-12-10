<?php
include 'model_dokter.php';

// Mengambil data dokter dari model
$listTabelDokter = getTabelDokter();

// Memasukkan tampilan
include 'view_dokter.php';
?>