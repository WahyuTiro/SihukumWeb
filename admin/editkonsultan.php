<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$thisPage = "lihatkonsultan";
$id_kontan = $_GET['id_kontan'];
$query = "SELECT * FROM konsultan WHERE id_kontan='$id_kontan'";
$hasil = mysqli_query($db, $query);
$datakontan = mysqli_fetch_assoc($hasil);
include 'head.php';
include 'sidebar.php';
include 'header.php';
?>
	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-person-outline"></i>
        <div>
          <h4>Edit Konsultan</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

	<div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form method="post" action="proseseditkonsultan.php" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_kontan" value="<?php echo $datakontan['id_kontan']; ?>">
                <p>NIK</p>
                <p><input class="form-control" type="text" name="nik" value="<?php echo $datakontan['nik']; ?>"></p>
                <p>Nama Konsultan</p>
                <p><input class="form-control" type="text" name="nm_kontan" value="<?php echo $datakontan['nm_kontan']; ?>"></p>
                <p>Tanggal Lahir</p>
                <p><input class="form-control" type="date" name="tgl_lahir" value="<?php echo $datakontan['tgl_lahir']; ?>"></p>
                <p>Jenis Kelamin</p>
                <p>
                <select class="form-control select2" type="text" name="jk" data-placeholder="Pilih Jenis Kelamin" required>
                  <option label="Pilih Jenis Kelamin" selected></option>
                  <option value="Laki-Laki">Laki-Laki</option>                  
                  <option value="Perempuan">Perempuan</option>
                </select>
                </p>
                <p>Jabatan/Departemen</p>
                <p><input class="form-control" type="text" name="departemen" value="<?php echo $datakontan['departemen']; ?>"></p>
                <p>Username</p>
                <p><input class="form-control" type="text" name="username" value="<?php echo $datakontan['username']; ?>"></p>
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