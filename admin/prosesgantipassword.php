<?php
session_start();
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
include '../includes/connection.php';
$id = $_POST['id'];
$passwordl = md5($_POST['passwordl']);
$passwordb = md5($_POST['passwordb']);
//cekuser
$cekuser = "SELECT * FROM admin where id='$id'";
$hasilcek = mysqli_query($db, $cekuser);
$datauser = array();
$rowuser = mysqli_fetch_assoc($hasilcek);
$passcek = $rowuser['password'];

if ($passcek==$passwordl) {
	$query = "UPDATE admin SET password='$passwordb' where id='$id'";
	$hasil = mysqli_query($db, $query);

	if ($hasil == true) {
	    header('Location: ../logout.php');
	} else {
	    header('Location: password.php');
	}	

}
else{
	echo "<script type='text/javascript'>
          alert('Password lama tidak sesuai');
          history.back(self);
          </script>";
}

