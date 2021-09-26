<?php

include '../includes/connection.php';

$id_jadwal = $_GET['id_jadwal'];

$query = "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: lihatjadwal.php');
} else {
    header('location: lihatjadwal.php');
}
