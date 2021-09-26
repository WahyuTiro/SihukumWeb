<?php

include '../includes/connection.php';

$id_kasus = $_GET['id_kasus'];

$query = "DELETE FROM kasus WHERE id_kasus='$id_kasus'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: lihatkasus.php');
} else {
    header('location: lihatkasus.php');
}
