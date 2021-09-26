<?php
session_start();
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
include '../includes/connection.php';
$id_pmohon = $_POST['id_pmohon'];
$nik = $_POST['nik'];
$nm_pmohon = addslashes($_POST['nm_pmohon']);
$tp_lahir = $_POST['tp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$pekerjaan = $_POST['pekerjaan'];
$username = $_POST['username'];
$password = addslashes(md5($_POST['password']));

	$query = "UPDATE pemohon SET nik='$nik', nm_pmohon='$nm_pmohon', tp_lahir='$tp_lahir', tgl_lahir='$tgl_lahir', jk='$jk', pekerjaan='$pekerjaan', username='$username', password='$password' WHERE id_pmohon='$id_pmohon'";
	$hasil = mysqli_query($db, $query);

	if ($hasil == true) {
	    header('Location: lihatpemohon.php');
	} else {
	    header('Location: lihatpemohon.php');
	}