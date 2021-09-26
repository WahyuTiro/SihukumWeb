<?php
if (session_status()!=PHP_SESSION_ACTIVE) {
	session_start();
}
if (! isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include '../includes/connection.php';
$id_kontan = $_SESSION['user']['id_kontan'];
$querykonsultan = "SELECT * FROM jadwal where id_kontan='$id_kontan'";
$dpkonsultan = array();
$hasilkonsultan = mysqli_query($db, $querykonsultan);
while ($rowkonsultan = mysqli_fetch_assoc($hasilkonsultan)) {
$dpkonsultan[] = $rowkonsultan['id_kasus'];
}
$implode = implode("' OR id_kasus ='", $dpkonsultan);

$kasus1 = "SELECT * FROM kasus where id_kasus='$implode'";
$kasus2 = mysqli_query($db, $kasus1);
$datakasus = array();

$jadwal1 = "SELECT * FROM jadwal where id_kontan='$id_kontan'";
$jadwal2 = mysqli_query($db, $jadwal1);
$datajadwal = array();
?>
