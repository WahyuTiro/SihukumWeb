<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
$thisPage = "profil";
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>
	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-contact-outline"></i>
        <div>
          <h4>Profil Konsultan</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        <div class="btn-demo">
          <div class="row">
            <div class="col-lg-3">
                <img src="foto/<?php echo $_SESSION['user']['foto']; ?>" class="img shadow-base mg-b-10 rounded" alt="" width="100%" height="300px">
                <p class="tx-12 tx-semibold tx-uppercase tx-inverse tx-spacing-1 tx-center tx-20">Foto Profil</p>
          </div><!-- col-3 -->

          <div class="col-lg-9">
          <div class="rounded table-responsive">
              <table class="table table-hover text-black mg-b-auto">
              <tr>
                <td width="20%">NIK</td>
                <td width="auto">: <?php echo $_SESSION['user']['nik']; ?></td>
              </tr>
              <tr>
                <td width="20%">Nama Lengkap</td>
                <td width="auto">: <?php echo $_SESSION['user']['nm_kontan']; ?></td>
              </tr>
              <tr>
                <td width="20%">Alamat</td>
                <td width="auto">: <?php echo $_SESSION['user']['alamat']; ?></td>
              </tr>
              <tr>
                <td width="20%">Tempat Lahir</td>
                <td width="auto">: <?php echo $_SESSION['user']['tp_lahir']; ?></td>
              </tr>
              <tr>
                <td width="20%">Tanggal Lahir</td>
                <td width="auto">: <?php echo tglindo($_SESSION['user']['tgl_lahir']); ?></td>
              </tr>
              <tr>
                <td width="20%">Jenis Kelamin</td>
                <td width="auto">: <?php echo $_SESSION['user']['jk']; ?></td>
              </tr>
              <tr>
                <td width="20%">Agama</td>
                <td width="auto">: <?php echo $_SESSION['user']['agama']; ?></td>
              </tr>
              <tr>
                <td width="20%">Departemen</td>
                <td width="auto">: <?php echo $_SESSION['user']['departemen']; ?></td>
              </tr>
              <tr>
                <td width="20%">Username</td>
                <td width="auto">: <?php echo $_SESSION['user']['username']; ?></td>
              </tr>
                <tr>
                  <td><a href="editprofil.php?id_kontan=<?php echo $_SESSION['user']['id_kontan']; ?>" class="btn btn-primary btn-block rounded-left" onClick="return confirm('Apakah ingin mengedit profil anda?');">Edit Profil</a></td>
                  <td></td>
                </tr>            
            </table>
          </div> 
          </div>
      </div>
  </div>

<?php 
include 'lampiran.php';
?>