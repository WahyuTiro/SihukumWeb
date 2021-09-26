<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$id_pmohon = $_SESSION['user']['id_pmohon'];
$query = "SELECT * FROM kasus where id_pmohon='$id_pmohon'";
$hasil = mysqli_query($db, $query);
$datakasus = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $datakasus[] = $row;
}
$thisPage = "lihatkasus";
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>

    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
          <h4>Lihat Kasus</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
              <div class="bd bd-gray-300 rounded table-responsive">
                <table width="100%" class="table table mg-b-0">
                <thead align="right">
                <tr>
                  <form method="post" action="filterkasus.php" enctype="multipart/form-data">
                  <th width="40%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;"><center>Filter Kasus</center></th>
                  <th width="55%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;">
                  <input class="form-control" type="date" name="tgl_kasus" ></th>
                  </th>
                  <th style="vertical-align:left; text-align: left; padding: 0.1rem 0.1rem 0.1rem 0.1rem;"><input type="submit" class="btn btn-success" value="Cari"></th>
                  </form>
                </tr>
                </thead>
                </table>           
              </div>
            
        <div class="bd bd-gray-300 rounded table-responsive">
         
            <?php if (empty($datakasus)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table width="97%" class="table table-hover table-sm mg-b-0">
                <thead>
                <tr class="tx-center">
                    <th>Judul Kasus</th>
                    <th>Deskripsi Kasus</th>
                    <th>Foto Bukti Kasus</th>
                    <th>Tanggal Kasus</th>
                    <th>Status Kasus</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datakasus as $kasus) : ?>
                <tr class="tx-center">
                    <td><?php echo  $kasus['jd_kasus']; ?></td>
                    <td>
                      <a href="javascript:void(0)" class="btndeskrip btn btn-info tx-11 tx-spacing-1 tx-semibold tx-mont pd-y-12 pd-x-20" id='<?php echo  $kasus['id_kasus']; ?>'>Lihat Kasus</a>
                    </td>
                    <td>
                      <a href="javascript:void(0)" class="btnfoto btn btn-info tx-11 tx-spacing-1 tx-semibold tx-mont pd-y-12 pd-x-20" id='<?php echo  $kasus['id_kasus']; ?>'>Lihat Bukti</a>               
                    <td><?php echo tglindo($kasus['tgl_kasus']) ?></td>
                    <td><?php echo  $kasus['st_kasus']; ?></td>
                    <td width="5%">
                    <a href="editkasus.php?id_kasus=<?php echo $kasus['id_kasus']; ?>" class="btn btn-warning btn-icon" onClick="return confirm('Anda yakin akan mengedit kasus ini?');"><div><i class="ion ion-compose tx-40" align="center"></i></div></a></td>
                    <td width="5%">
                    <a href="hapuskasus.php?id_kasus=<?php echo $kasus['id_kasus']; ?>" class="btn btn-danger btn-icon" onClick="return confirm('Anda yakin akan menghapus kasus ini?');"><div><i class="ion ion-trash-a tx-40" align="center"></i></div></a></td>
                </tr>
                </tbody>
                <?php  endforeach ?>
            </table>
            <?php endif ?> 
            </div>
        </div>
        </div>

      </div>
    </div>
    
 <!-- Modal Popup untuk Foto--> 
<div id="Modalbukti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<!-- Modal Popup untuk Deskripsi--> 
<div id="Modaldeskripsi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <?php 
include 'lampiran.php';
?>