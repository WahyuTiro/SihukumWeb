<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$id_kontan = $_SESSION['user']['id_kontan'];
$query = "SELECT * FROM jadwal where id_kontan='$id_kontan'";
$hasil = mysqli_query($db, $query);
$datajadwal = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $datajadwal[] = $row;
}

$thisPage = "lihatjadwal";
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>

    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-calendar-outline"></i>
        <div>
          <h4>Jadwal Konsultasi</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
            
        <div class="bd bd-gray-300 rounded table-responsive">
         
            <?php if (empty($datajadwal)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table width="97%" class="table table-hover table-sm mg-b-0">
                <thead>
                <tr align="center">
                    <th>Kasus</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Nama Pemohon</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datajadwal as $jadwal) : ?>
                <tr align="center">
                    <td><?php echo $jadwal['jd_kasus'] ?></td>
                    <td><?php echo $jadwal['hari'] ?></td>
                    <td><?php echo tglindo($jadwal['tgl_jadwal']) ?></td>
                    <td><?php echo $jadwal['nm_pmohon'] ?></td>
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
 
 <?php 
include 'lampiran.php';
?>