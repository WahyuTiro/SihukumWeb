<?php
if (session_status()!=PHP_SESSION_ACTIVE) {
	session_start();
}
if (! isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include '../includes/connection.php';
$kontan1 = "SELECT * FROM konsultan";
$kontan2 = mysqli_query($db, $kontan1);
$datakontan = array();

$pmohon1 = "SELECT * FROM pemohon";
$pmohon2 = mysqli_query($db, $pmohon1);
$datapmohon = array();

$kasus1 = "SELECT * FROM kasus";
$kasus2 = mysqli_query($db, $kasus1);
$datakasus = array();

$jadwal1 = "SELECT * FROM jadwal";
$jadwal2 = mysqli_query($db, $jadwal1);
$datajadwal = array();

$berita1 = "SELECT * FROM berita";
$berita2 = mysqli_query($db, $berita1);
$databerita = array();
?>
