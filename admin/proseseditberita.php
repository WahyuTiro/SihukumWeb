<?php
session_start();
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
include '../includes/connection.php';
$id_berita = $_POST['id_berita'];
$permalink = addslashes($_POST['permalink']);
$judul_berita = addslashes($_POST['judul_berita']);
$kategori_berita = $_POST['kategori_berita'];
$penulis_berita = addslashes($_POST['penulis_berita']);
$hari_berita = $_POST['hari_berita'];
$tanggal_berita = $_POST['tanggal_berita'];
$isi_berita = addslashes($_POST['isi_berita']);

$q = mysqli_query($db, "SELECT foto_berita FROM berita WHERE id_berita = $id_berita");
$hasil = mysqli_fetch_assoc($q);
$foto_lama = $hasil['foto_berita'];
if (!empty($_FILES['foto_berita']['tmp_name']) AND $_FILES["foto_berita"]["size"] <= 1024000) {
    $file        = $_FILES['foto_berita']['tmp_name'];
    $nama_file   = $_FILES['foto_berita']['name'];
    $destination = "../admin/img_berita/" . $nama_file;
    $foto_baru = $nama_file;
 
} else {
    $foto_baru = $foto_lama;
}

    $query = "UPDATE berita SET permalink='$permalink', judul_berita='$judul_berita', kategori_berita='$kategori_berita', penulis_berita='$penulis_berita', hari_berita='$hari_berita', tanggal_berita='$tanggal_berita',isi_berita='$isi_berita', foto_berita='$foto_baru' WHERE id_berita='$id_berita'";
    $hasil = mysqli_query($db, $query);

    if ($hasil == true) {
        if ($_FILES["foto_berita"]["size"] <= 1024000){
        if (!empty($_FILES['foto_berita']['tmp_name'])) {
        unlink("../admin/img_berita/" . $foto_lama);
        move_uploaded_file($file, $destination);
        }
        header('Location: lihatberita.php');
        }
    else{
        echo "<script type='text/javascript'>
          alert('Ukuran gambar anda lebih dari 1Mb');
          history.back(self);
          </script>";
    }
    } else {
        header('Location: editberita.php');
    }   


