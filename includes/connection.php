<?php
$host = "localhost";
$user = "u942710605_sihukum";
$pass = "Wahyu16FT@";
$database = "u942710605_sihukum";

$db=mysqli_connect($host, $user, $pass, $database) or die("Koneksi gagal");
mysqli_select_db($db,$database) or die("Database tidak bisa dibuka");
?>
