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
          <h4>List Kasus</h4>
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
                  <input type="date" name="tgl_kasus" class="form-control">
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
            <table width="100%" class="table table-hover mg-b-0">
                <thead>
                <tr align="center">
                    <th>Judul Kasus</th>
                    <th>Detail Kasus</th>
                    <th>Tanggal Kasus</th>
                    <th>Status Kasus</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datakasus as $kasus) : ?>
                <tr>
                    <td align="center"><?php echo $kasus['jd_kasus'] ?></td> 
                    <td align="center">
                        <a href="" class="btn btn-teal btn-with-icon" data-toggle="modal" data-target="#detailkasus">
                          <div class="ht-20 justify-content-between">
                            <span><i class="ion ion-eye tx-30"></i></span>
                            <span class="pd-x-5">Lihat Detail</span>
                          </div>
                        </a>
                    </td>
                    <td align="center"><?php echo tglindo($kasus['tgl_kasus']) ?></td>
                    <td align="center"><?php echo $kasus['st_kasus'] ?></td>
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

        <!-- Start Detail Kasus -->
          <div id="detailkasus" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-20 mg-b-0 tx-uppercase tx-inverse tx-bold">DETAIL KASUS</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-10">
                  <h4 class="lh-3 mg-b-20 tx-inverse" align="center">- FOTO BUKTI -</h4>
                  <img src="../admin/img_kasus/<?php echo $kasus['bk_kasus']; ?>" class="img-fluid rounded" alt="" width="100%">
                </div>
                <div class="modal-body pd-10">
                  <h4 class="lh-3 mg-b-20 tx-inverse"align="center">- DESKRIPSI KASUS -</h4>
                  <p class="mg-b-5" align="justify"><?php echo $kasus['dk_kasus'] ?></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger tx-size-xs" data-dismiss="modal">TUTUP</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Detail Kasus -->

          
      </div>
    </div>

<?php 
include 'lampiran.php';
?>