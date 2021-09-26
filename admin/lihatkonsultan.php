<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$query = "SELECT * FROM konsultan";

$hasil = mysqli_query($db, $query);

$datakontan = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $datakontan[] = $row;
}
$thisPage = "lihatkonsultan";
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>

	<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-person-outline"></i>
        <div>
          <h4>Lihat Konsultan</h4>
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
                  <form method="post" action="filterkonsultan.php" enctype="multipart/form-data">
                  <th width="40%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;"><center>Filter Konsultan</center></th>
                  <th width="55%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;">
                  <input type="text" name="nik" class="form-control" placeholder="NIK">
                  </th>
                  <th style="vertical-align:left; text-align: left; padding: 0.1rem 0.1rem 0.1rem 0.1rem;"><input type="submit" class="btn btn-success" value="Cari"></th>
                  </form>
                </tr>
                </thead>
                </table>           
              </div>
            
        <div class="bd bd-gray-300 rounded table-responsive">
         
            <?php if (empty($datakontan)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table width="97%" class="table table-hover table-sm mg-b-0">
                <thead>
                <tr align="center">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan/Dept.</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach ($datakontan as $kontan) : ?>
                <tr align="center">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $kontan['nik'] ?></td>
                    <td><?php echo $kontan['nm_kontan'] ?></td>
                    <td><?php echo $kontan['departemen'] ?></td>
                    <td><?php echo $kontan['alamat'] ?></td>
                    <td><?php echo $kontan['jk'] ?></td>
                    <td width="5%">
                    <a href="editkonsultan.php?id_kontan=<?php echo $kontan['id_kontan']; ?>" class="btn btn-warning btn-icon" onClick="return confirm('Anda yakin akan mengedit konsultan ini?');"><div><i class="ion ion-compose tx-40" align="center"></i></div></a></td>
                    <td width="5%">
                    <a href="hapuskonsultan.php?id_kontan=<?php echo $kontan['id_kontan']; ?>" class="btn btn-danger btn-icon" onClick="return confirm('Anda yakin akan menghapus konsultan ini?');"><div><i class="ion ion-trash-a tx-40" align="center"></i></div></a></td>
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