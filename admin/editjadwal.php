<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$thisPage = "lihatjadwal";
$id_jadwal = $_GET['id_jadwal'];
$query = "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'";
$hasil = mysqli_query($db, $query);
$datajadwal = mysqli_fetch_assoc($hasil);
include 'head.php';
include 'sidebar.php';
include 'header.php';
#DP Pemohon
$querypmohon = "SELECT * FROM kasus";
$hasilpmohon = mysqli_query($db, $querypmohon);
$dppmohon = array();
#DP Konsultan
$querykontan = "SELECT * FROM kontan";
$hasilkontan = mysqli_query($db, $querykontan);
$dpkontan = array();
?>
	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-calendar-outline"></i>
        <div>
          <h4>Edit Jadwal</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

	<div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form method="post" action="proseseditjadwal.php" enctype="multipart/form-data">
          <input class="form-control" type="hidden" name="id_jadwal" value="<?php echo $datajadwal['id_jadwal']; ?>">
                <p>Nama Pemohon</p>
                <p>
                <select name="nm_pmohon" class="form-control select2" data-placeholder="Pilih Pemohon / Kasus">
                  <option value="<?php echo $datajadwal['id_pmohon']?>/<?php echo $datajadwal['nm_pmohon']?>/<?php echo $datajadwal['jd_kasus']; ?>/<?php echo $datajadwal['id_kasus']; ?>" selected><?php echo $datajadwal['nm_pmohon'];?> / <?php echo $datajadwal['jd_kasus']; ?></option>
                  <?php
                   while ($rowpmohon = mysqli_fetch_assoc($hasilpmohon)) {
                    $dppmohon0 = $rowpmohon['id_pmohon'];
                    $dppmohon1 = $rowpmohon['nm_pmohon'];
                    $dppmohon2 = $rowpmohon['jd_kasus'];
                    $dppmohon3 = $rowpmohon['id_kasus'];
                    echo "<option value='".strtr($dppmohon0, array ("'"=>'&#39;'))."/".strtr($dppmohon1, array ("'"=>'&#39;'))."/".strtr($dppmohon2, array ("'"=>'&#39;'))."/".strtr($dppmohon3, array ("'"=>'&#39;'))."'>$dppmohon1 / $dppmohon2</option>";
                    }
                  ?>
                </select>  
                </p>
                <p>Hari</p>
                <p>
                <select name="hari" class="form-control select2" data-placeholder="Pilih Hari">
                  <option value="<?php echo $datajadwal['hari']; ?>" selected><?php echo $datajadwal['hari']; ?></option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jum'at">Jum'at</option>
                  <option value="Sabtu">Sabtu</option>
                </select>
                </p>
                <p>Tanggal</p>
                <p><input class="form-control" type="date" name="tgl_jadwal" required value="<?php echo $datajadwal['tgl_jadwal']; ?>"></p>
                <p>Nama Konsultan</p>
                <p>
                <select name="nm_kontan" class="form-control select2" data-placeholder="Pilih Konsultan / Jabatan">
                   <option value="<?php echo $datajadwal['id_kontan'];?>/<?php echo $datajadwal['nm_kontan'];?>" selected><?php echo $datajadwal['nm_kontan']; ?> / <?php echo $datajadwal['departemen']; ?></option>
                  <?php
                    while ($rowkontan = mysqli_fetch_assoc($hasilkontan)) {
                    $dpkontan0 = $rowkontan['id_kontan'];
                    $dpkontan1 = $rowkontan['nm_kontan'];
                    $dpkontan2 = $rowkontan['departemen'];
                    echo "<option value='".strtr($dpkontan0, array ("'"=>'&#39;'))."/".strtr($dpkontan1, array ("'"=>'&#39;'))."/".strtr($dpkontan2, array ("'"=>'&#39;'))."'>$dpkontan1 / $dpkontan2</option>";
                    }
                  ?>
                </select>  
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