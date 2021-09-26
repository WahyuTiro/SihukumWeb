<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$tgl_jadwal = $_POST['tgl_jadwal'];
$query = "SELECT * FROM jadwal where tgl_jadwal = '$tgl_jadwal'";
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
          <h4>Lihat Jadwal</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

  <div class="br-pagebody">
    <div class="br-section-wrapper">
            <div class="card shadow-base overflow-hidden">
              <div class="pd-y-10 pd-x-10 pd-t-20">
                <div class="d-xs-flex justify-content-center align-items-center">
                <h6 class="tx-uppercase tx-inverse tx-spacing-2 tx-bold mg-b-0">KALENDER</h6>
                </div>
                  <div class="d-flex justify-content-center">
                    <div class="fc-datepicker mg-y-5"></div>
                  </div><!-- col-6 -->
              </div><!-- pd-x-25 -->
            </div><!-- card -->

         <div class="btn-demo mg-t-20">
              <div class="bd bd-gray-300 rounded table-responsive">
                <table width="100%" class="table table mg-b-0">
                <thead align="right">
                <tr>
                  <form method="post" action="filterjadwal.php" enctype="multipart/form-data">
                  <th width="40%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;"><center>Filter Jadwal</center></th>
                  <th width="55%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;"><input class="form-control" type="date" name="tgl_jadwal" ></th>
                    <th style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.1rem;"><input type="submit" class="btn btn-success" value="Cari"></th>
                    <th style="vertical-align:middle; padding: 0.1rem 0.75rem 0.1rem 0.75rem;"><a href="tambahjadwal.php" class="btn btn-primary">Tambah Jadwal</a></th>
                    </form>
                  </form>
                </tr>
                </thead>
              </table>
            </div>

        <div class="bd bd-gray-300 rounded table-responsive">
         
            <?php if (empty($datajadwal)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table width="97%" class="table table-hover mg-b-0">
                <thead>
                <tr align="center">
                    <th>Nama Pemohon</th>
                    <th>Kasus</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Konsultan</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datajadwal as $jadwal) : ?>
                <tr align="center">
                    <td><?php echo $jadwal['nm_pmohon'] ?></td>
                    <td><?php echo $jadwal['jd_kasus'] ?></td>
                    <td><?php echo $jadwal['hari'] ?></td>
                    <td><?php echo tglindo($jadwal['tgl_jadwal']) ?></td>
                    <td><?php echo $jadwal['nm_kontan'] ?></td>
                    <td width="5%">
                    <a href="editjadwal.php?id_jadwal=<?php echo $jadwal['id_jadwal']; ?>" class="btn btn-warning btn-icon" onClick="return confirm('Anda yakin akan mengedit jadwal ini?');"><div><i class="ion ion-compose tx-40" align="center"></i></div></a></td>
                    <td width="5%">
                    <a href="hapusjadwal.php?id_jadwal=<?php echo $jadwal['id_jadwal']; ?>" class="btn btn-danger btn-icon" onClick="return confirm('Anda yakin akan menghapus jadwal ini?');"><div><i class="ion ion-trash-a tx-40" align="center"></i></div></a></td>
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