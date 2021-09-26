<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$thisPage = "lihatpemohon";
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
        <i class="icon ion-ios-people-outline"></i>
        <div>
          <h4>Edit Pemohon</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>


  <div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form method="post" action="proseseditpemohon.php" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_pmohon" value="<?php echo $datapmohon['id_pmohon']; ?>">
                <p>NIK</p>
                <p><input class="form-control" type="text" name="nik" value="<?php echo $datapmohon['nik']; ?>"></p>
                <p>Nama Lengkap</p>
                <p><input class="form-control" type="text" name="nm_pmohon" value="<?php echo $datapmohon['nm_pmohon']; ?>"></p>
                <p>Tempat Lahir</p>
                <p><input class="form-control" type="text" name="tp_lahir" value="<?php echo $datapmohon['tp_lahir']; ?>"></p>
                <p>Tanggal Lahir</p>
                <p><input class="form-control" type="date" name="tgl_lahir" value="<?php echo $datapmohon['tgl_lahir']; ?>"></p>
                <p>Jenis Kelamin</p>
                <p>
                <select class="form-control select2" type="text" name="jk" data-placeholder="Pilih Jenis Kelamin" required>
                  <option label="Pilih Jenis Kelamin" selected></option>
                  <option value="Laki-Laki">Laki-Laki</option>                  
                  <option value="Perempuan">Perempuan</option>
                </select>
                </p>
                <p>Pekerjaan</p>
                <p><input class="form-control" type="text" name="pekerjaan" value="<?php echo $datapmohon['pekerjaan']; ?>"></p>
                <p>Username</p>
                <p><input class="form-control" type="text" name="username" value="<?php echo $datapmohon['username']; ?>"></p>
                <p>Password</p>
                <p><input class="form-control" type="password" name="password" placeholder="Masukkan password baru" required></p>
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