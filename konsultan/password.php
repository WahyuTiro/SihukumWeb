<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
$thisPage = "password";
include 'head.php';
include 'sidebar.php';
include 'header.php';
?>
	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-locked-outline"></i>
        <div>
          <h4>Ganti Password</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

	<div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form method="post" action="prosesgantipassword.php" enctype="multipart/form-data">
          <input class="form-control" type="hidden" name="id" value="<?php echo $_SESSION['user']['id']; ?>">
                <p>Password Lama</p>
                <p><input class="form-control" type="text" name="passwordl" required></p>
                <p>Password Baru</p>
                <p><input class="form-control" type="text" name="passwordb" required></p>
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