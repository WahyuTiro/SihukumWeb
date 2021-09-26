<?php 
session_start(); 
if (empty($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}
$thisPage = "beranda";
include 'jumlah.php';
include 'head.php';
include 'sidebar.php';
include 'header.php';
?>
 
         <!-- MODAL ALERT MESSAGE -->
          <div id="ModalCovid19" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <img src="../assets/images/stopcovid-19.png" class="mg-t-20 mg-b-20 d-inline-block" width="20%">
                  <h4 class="tx-danger tx-16 tx-uppercase tx-spacing-1 tx-bold mg-b-10">Perhatian!!!</h4>
                  <p class="tx-justify tx-14 mg-b-20 mg-x-20">Selamat datang di Sistem Informasi Konsultasi Bantuan Hukum. Semoga sehat selalu dengan tetap ikuti protokol kesehatan COVID-19, disiplin pakai masker, jaga jarak, cuci tangan, dan terus jalankan hidup sehat dan bersih. Sehat itu penting.</p>
                  <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                    Lanjut
                  </button>
                </div><!-- modal-body -->
              </div><!-- modal-content -->
            </div><!-- modal-dialog -->
          </div><!-- modal -->

<div class="br-mainpanel">
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Beranda Admin</h4>
      <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="bg-primary rounded overflow-hidden">
          <div class="pd-x-20 pd-t-20 d-flex align-items-center">
            <i class="ion ion-ios-person-outline tx-60 lh-0 tx-white op-7"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Jumlah Konsultan</p>
              <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo mysqli_num_rows($kontan2); ?></p>
            </div>
          </div>
          <div id="ch1" class="ht-50 tr-y-1"></div>
        </div>
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="bg-purple  rounded overflow-hidden">
          <div class="pd-x-20 pd-t-20 d-flex align-items-center">
            <i class="ion ion-ios-people-outline tx-60 lh-0 tx-white op-7"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Jumlah Pemohon</p>
              <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo mysqli_num_rows($pmohon2); ?></p>
            </div>
          </div>
          <div id="ch2" class="ht-50 tr-y-1"></div>
        </div>
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="bg-orange rounded overflow-hidden">
          <div class="pd-x-20 pd-t-20 d-flex align-items-center">
            <i class="ion ion-ios-paper-outline tx-60 lh-0 tx-white op-7"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Jumlah Kasus</p>
              <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo mysqli_num_rows($kasus2); ?></p>
            </div>
          </div>
          <div id="ch3" class="ht-50 tr-y-1"></div>
        </div>
      </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-calendar tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Jumlah Jadwal</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo mysqli_num_rows($jadwal2); ?></p>
                </div>
              </div>
              <div id="ch4" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
    </div><!-- row -->



  <?php 
  include 'footer.php';
  include 'lampiran.php';
  ?>