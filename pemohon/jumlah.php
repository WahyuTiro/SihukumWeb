<?php
if (session_status()!=PHP_SESSION_ACTIVE) {
	session_start();
}
if (! isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include '../includes/connection.php';
$id_pmohon = $_SESSION['user']['id_pmohon'];
$kasus1 = "SELECT * FROM kasus where id_pmohon='$id_pmohon'";
$kasus2 = mysqli_query($db, $kasus1);
$datakasus = array();

$jadwal1 = "SELECT * FROM jadwal where id_pmohon='$id_pmohon'";
$jadwal2 = mysqli_query($db, $jadwal1);
$datajadwal = array();
?>
