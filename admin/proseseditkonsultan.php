<?php
session_start();
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
include '../includes/connection.php';
$id_kontan = $_POST['id_kontan'];
$nik = $_POST['nik'];
$nm_kontan = addslashes($_POST['nm_kontan']);
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$departemen = addslashes($_POST['departemen']);
$username = $_POST['username'];
$password = addslashes(md5($_POST['password']));

	$query = "UPDATE konsultan SET nik='$nik', nm_kontan='$nm_kontan', tgl_lahir='$tgl_lahir', jk='$jk', departemen='$departemen', username='$username', password='$password' WHERE id_kontan='$id_kontan'";
	$hasil = mysqli_query($db, $query);

	if ($hasil == true) {
	    header('Location: lihatkonsultan.php');
	} else {
	    header('Location: lihatkonsultan.php');
	}

