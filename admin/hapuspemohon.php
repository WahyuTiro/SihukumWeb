<?php

include '../includes/connection.php';

$id_pmohon = $_GET['id_pmohon'];

$query = "DELETE FROM pemohon WHERE id_pmohon='$id_pmohon'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: lihatpemohon.php');
} else {
    header('location: lihatpemohon.php');
}
