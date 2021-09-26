<?php

include '../includes/connection.php';

$id_kontan = $_GET['id_kontan'];

$query = "DELETE FROM konsultan WHERE id_kontan='$id_kontan'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: lihatkonsultan.php');
} else {
    header('location: lihatkonsultan.php');
}
