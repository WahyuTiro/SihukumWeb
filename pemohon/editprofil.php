<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$thisPage = "profil";
$id_pmohon = $_GET['id_pmohon'];
$query = "SELECT * FROM pemohon WHERE id_pmohon='$id_pmohon'";
$hasil = mysqli_query($db, $query);
$datapmohon = mysqli_fetch_assoc($hasil);
include 'head.php';
include 'sidebar.php';
include 'header.php';
?>
	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon "></i>
        <div>
          <h4>Edit Profil Pemohon</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

	<div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form method="post" action="proseseditprofil.php" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_pmohon" value="<?php echo $datapmohon['id_pmohon']; ?>">
                <p>NIK</p>
                <p><input class="form-control" type="text" name="nik" value="<?php echo $datapmohon['nik']; ?>"></p>
                <p>Nama Lengkap</p>
                <p><input class="form-control" type="text" name="nm_pmohon" value="<?php echo $datapmohon['nm_pmohon']; ?>"></p>
                <p>Alamat</p>
                <p><input class="form-control" type="text" name="alamat" value="<?php echo $datapmohon['alamat']; ?>"></p>
                <p>Tempat Lahir</p>
                <p><input class="form-control" type="text" name="tp_lahir" value="<?php echo $datapmohon['tp_lahir']; ?>"></p>
                <p>Tanggal Lahir</p>
                <p><input class="form-control" type="date" name="tgl_lahir" value="<?php echo $datapmohon['tgl_lahir']; ?>"></p>
                <p>Jenis Kelamin</p>
                <p><input class="form-control" type="text" name="jk" value="<?php echo $datapmohon['jk']; ?>"></p>
                <p>Agama</p>
                <p><input class="form-control" type="text" name="agama" value="<?php echo $datapmohon['agama']; ?>"></p>
                <p>Pekerjaan</p>
                <p><input class="form-control" type="text" name="pekerjaan" value="<?php echo $datapmohon['pekerjaan']; ?>"></p>
                <p>Foto Profil <i>(Ukuran Gambar Maksimal 1Mb)</i></p>
                <p>
                      <div class="ht-200 bg-gray-200 d-flex align-items-center justify-content-center">
                        <input type="file" name="foto" id="file-1" class="inputfile" data-multiple-caption="{count} files selected" multiple value="<?php echo $datapmohon['foto']; ?>">
                        <label for="file-1" class="tx-white bg-info">
                          <i class="icon ion-ios-upload-outline tx-24"></i>
                          <span><?php echo $datapmohon['foto']; ?></span>
                        </label>
                      </div>
                </p>
                <p>Username</p>
                <p><input class="form-control" type="text" name="username" value="<?php echo $datapmohon['username']; ?>"></p>
                <p>Password</p>
                <p><input class="form-control" type="password" name="password" placeholder="Masukkan password anda" required></p>
                <p>
                    <div class="row">
                      <div class="col-sm-6 col-md-2 mg-t-0">
                        <input type="submit" class="btn btn-success btn-block mg-b-10" value="Simpan">
                      </div>
                      <div class="col-sm-6 col-md-2 mg-t-0">
                        <input type="reset" class="btn btn-warning btn-block mg-b-10" value="Batal" onclick="self.history.back();">
                      </div>
                    </div>
                </p>
            </form>
         </div> 
        </div>
      </div>
    </div>
<?php 
include 'lampiran.php';
?>