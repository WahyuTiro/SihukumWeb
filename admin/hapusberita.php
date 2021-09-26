<?php

include '../includes/connection.php';
$id_berita = $_GET['id_berita'];

$query = "DELETE FROM berita WHERE id_berita='$id_berita'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: lihatberita.php');
} else {
    header('location: lihatberita.php');
}
