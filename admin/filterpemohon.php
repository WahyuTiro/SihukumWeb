<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$nik = $_POST['nik'];
$query = "SELECT * FROM pemohon where nik='$nik'";

$hasil = mysqli_query($db, $query);

$datapmohon = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $datapmohon[] = $row;
}
$thisPage = "lihatpemohon";
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>

	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-people-outline"></i>
        <div>
          <h4>Lihat Pemohon</h4>
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
                  <form method="post" action="filterpemohon.php" enctype="multipart/form-data">
                  <th width="40%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;"><center>Filter Pemohon</center></th>
                  <th width="55%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;">
                  <input type="text" name="nik" class="form-control" placeholder="NIK">
                  </th>
                  <th style="vertical-align:middle; text-align: left; padding: 0.1rem 0.1rem 0.1rem 0.1rem;"><input type="submit" class="btn btn-success" value="Cari"></th>
                  </form>
                </tr>
                </thead>
                </table>           
              </div>
            
        <div class="bd bd-gray-300 rounded table-responsive">
         
            <?php if (empty($datapmohon)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table width="97%" class="table table-hover mg-b-0">
                <thead>
                <tr align="center">
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datapmohon as $pmohon) : ?>
                <tr align="center">
                    <td><?php echo $pmohon['nik'] ?></td>
                    <td><?php echo $pmohon['nm_pmohon'] ?></td>
                    <td><?php echo $pmohon['alamat'] ?></td>
                    <td><?php echo $pmohon['tp_lahir'] ?></td>
                    <td><?php echo tglindo($pmohon['tgl_lahir']) ?></td>
                    <td><?php echo $pmohon['jk'] ?></td>
                    <td><?php echo $pmohon['pekerjaan'] ?></td>
                    <td><?php echo $pmohon['agama'] ?></td>

                    <td width="5%">
                    <a href="editpemohon.php?id_pmohon=<?php echo $pmohon['id_pmohon']; ?>" class="btn btn-warning btn-icon" onClick="return confirm('Anda yakin akan mengedit pemohon ini?');"><div><i class="ion ion-compose tx-40" align="center"></i></div></a></td>
                    <td width="5%">
                    <a href="hapuspemohon.php?id_pmohon=<?php echo $pmohon['id_pmohon']; ?>" class="btn btn-danger btn-icon" onClick="return confirm('Anda yakin akan menghapus pemohon ini?');"><div><i class="ion ion-trash-a tx-40" align="center"></i></div></a></td>

                    </td>
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