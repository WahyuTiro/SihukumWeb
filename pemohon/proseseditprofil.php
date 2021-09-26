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
$alamat = addslashes($_POST['alamat']);
$tp_lahir = addslashes($_POST['tp_lahir']);
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$pekerjaan = $_POST['pekerjaan'];
$agama = $_POST['agama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$q = mysqli_query($db, "SELECT foto FROM pemohon WHERE id_pmohon = $id_pmohon");
$hasil = mysqli_fetch_assoc($q);
$foto_lama = $hasil['foto'];
if (!empty($_FILES['foto']['tmp_name']) AND $_FILES["foto"]["size"] <= 1024000) {
    $file        = $_FILES['foto']['tmp_name'];
    $nama_file   = $_FILES['foto']['name'];
    $destination = "foto/" . $nama_file;
    $foto_baru = $nama_file;
 
} else {
    $foto_baru = $foto_lama;
}



	$query = "UPDATE pemohon SET nik='$nik', nm_pmohon='$nm_pmohon', alamat='$alamat', tp_lahir='$tp_lahir', tgl_lahir='$tgl_lahir', jk='$jk', pekerjaan='$pekerjaan', agama='$agama', username='$username', password='$password', foto='$foto_baru' WHERE id_pmohon='$id_pmohon'";
	$hasil = mysqli_query($db, $query);

	if ($hasil == true) {
		if ($_FILES["foto"]["size"] <= 1024000){
        if (!empty($_FILES['foto']['tmp_name'])) {
        unlink("foto/" . $foto_lama);
        move_uploaded_file($file, $destination);
        }
        header('Location: ../logout.php');
        }
    else{
        echo "<script type='text/javascript'>
          alert('Ukuran gambar anda lebih dari 1Mb');
          history.back(self);
          </script>";
    }
	} else {
	    header('Location: editprofil.php');
	}	


