<?php
session_start();
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
} 
include '../includes/connection.php';
$id_jadwal = $_POST['id_jadwal'];
$nm_pmohon1 = addslashes($_POST['nm_pmohon']);
$pecah = explode("/", $nm_pmohon1);
$id_pmohon = $pecah[0];
$nm_pmohon = $pecah[1];
$jd_kasus = $pecah[2];
$id_kasus = $pecah[3];
$hari = $_POST['hari'];
$tgl_jadwal = $_POST['tgl_jadwal'];
$nm_kontan1 = addslashes($_POST['nm_kontan']);
$bagi = explode("/", $nm_kontan1);
$id_kontan = $bagi[0];
$nm_kontan = $bagi[1];
$departemen = $bagi[1];


	$query = "UPDATE jadwal SET id_pmohon='$id_pmohon', nm_pmohon='$nm_pmohon', jd_kasus='$jd_kasus', hari='$hari', tgl_jadwal='$tgl_jadwal', id_kontan='$id_kontan', nm_kontan='$nm_kontan', departemen='$departemen', id_kasus='$id_kasus' WHERE id_jadwal='$id_jadwal'";
	$hasil = mysqli_query($db, $query);

	if ($hasil == true) {
	    header('Location: lihatjadwal.php');
	} else {
	    header('Location: lihatjadwal.php');
	}	
