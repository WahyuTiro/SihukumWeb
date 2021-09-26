<?php
session_start();
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
include '../includes/connection.php';
$id_kasus = $_POST['id_kasus'];
$id_pmohon = $_POST['id_pmohon'];
$nm_pmohon = addslashes($_POST['nm_pmohon']);
$jd_kasus = addslashes($_POST['jd_kasus']);
$tgl_kasus = $_POST['tgl_kasus'];
$dk_kasus = addslashes($_POST['dk_kasus']);
$st_kasus = "Diajukan";

$q = mysqli_query($db, "SELECT bk_kasus FROM kasus WHERE id_kasus = $id_kasus");
$hasil = mysqli_fetch_assoc($q);
$foto_lama = $hasil['bk_kasus'];
if (!empty($_FILES['bk_kasus']['tmp_name']) AND $_FILES["bk_kasus"]["size"] <= 1024000) {
    $file        = $_FILES['bk_kasus']['tmp_name'];
    $nama_file   = $_FILES['bk_kasus']['name'];
    $destination = "../admin/img_kasus/" . $nama_file;
    $foto_baru = $nama_file;
 
} else {
    $foto_baru = $foto_lama;
}

	$query = "UPDATE kasus SET id_pmohon='$id_pmohon', nm_pmohon='$nm_pmohon', jd_kasus='$jd_kasus', dk_kasus='$dk_kasus', bk_kasus='$foto_baru', tgl_kasus='$tgl_kasus', st_kasus='$st_kasus' WHERE id_kasus='$id_kasus'";
	$hasil = mysqli_query($db, $query);

	if ($hasil == true) {
		if ($_FILES["bk_kasus"]["size"] <= 1024000){
        if (!empty($_FILES['bk_kasus']['tmp_name'])) {
        unlink("../admin/img_kasus/" . $foto_lama);
        move_uploaded_file($file, $destination);
        }
        header('Location: lihatkasus.php');
        }
    else{
        echo "<script type='text/javascript'>
          alert('Ukuran gambar anda lebih dari 1Mb');
          history.back(self);
          </script>";
    }
	} else {
	    header('Location: editkasus.php');
	}	

