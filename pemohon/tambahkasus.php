<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
$thisPage = "tambahkasus";
$id_pmohon = $_SESSION['user']['id_pmohon'];
$nm_pmohon = $_SESSION['user']['nm_pmohon'];
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>
	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
          <h4>Tambah Kasus</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

	<div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form id="formpemohon" method="post" action="prosestambahkasus.php" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_kasus" value="<?php echo $id_kasus;?>">
                <input class="form-control" type="hidden" name="id_pmohon" value="<?php echo $id_pmohon;?>">
                <input class="form-control" type="hidden" name="nm_pmohon" value="<?php echo $nm_pmohon;?>">
                <p>Judul Kasus</p>
                <p><input class="form-control" type="text" name="jd_kasus" placeholder="Masukkan judul kasus" required></p>
                <p>Tanggal Kasus</p>
                <p><input class="form-control" type="date" name="tgl_kasus" required></p>
                <p>Deskripsi Kasus</p>
                <p><textarea class="form-control" style="resize:none; width:100%; height:300px; font-size: 14px;" type="text" name="dk_kasus" placeholder="Deskripsikan kasus anda secara singkat dan jelas" required></textarea></p> 
                <p>Upload Bukti Kasus <i>(Ukuran Gambar Maksimal 1Mb)</i></p>
                <p>
                      <div class="ht-200 bg-gray-200 d-flex align-items-center justify-content-center">
                        <input type="file" name="bk_kasus" id="file-1" class="inputfile" data-multiple-caption="{count} files selected" multiple required>
                        <label for="file-1" class="tx-white bg-info">
                          <i class="icon ion-ios-upload-outline tx-24"></i>
                          <span>Pilih Foto ...</span>
                        </label>
                      </div>
                </p>
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