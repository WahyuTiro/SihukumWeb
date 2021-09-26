<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$query = "SELECT * FROM berita";
$hasil = mysqli_query($db, $query);
$databerita = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $databerita[] = $row;
}
$thisPage = "lihatberita";
include 'head.php';
include 'sidebar.php';
include 'header.php';
include 'formattanggal.php';
?>

  <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-world-outline"></i>
        <div>
          <h4>List Berita</h4>
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
                  <form method="post" action="filterberita.php" enctype="multipart/form-data">
                  <th width="40%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;"><center>Filter Berita</center></th>
                  <th width="55%" style="vertical-align:middle; padding: 0.1rem 0.1rem 0.1rem 0.75rem;">
                  <input type="text" name="kategori_berita" class="form-control" placeholder="Kategori Berita">
                  </th>
                  <th style="vertical-align:left; text-align: left; padding: 0.1rem 0.1rem 0.1rem 0.1rem;"><input type="submit" class="btn btn-success" value="Cari"></th>
                  </form>
                </tr>
                </thead>
                </table>           
              </div>
            
        <div class="bd bd-gray-300 rounded table-responsive">
         
            <?php if (empty($databerita)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table width="97%" class="table table-hover mg-b-0">
                <thead>
                <tr align="center">
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Penulis Berita</th>
                    <th>Hari Publikasi</th>
                    <th>Tanggal Publikasi</th>
                    <th>Detail Berita</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($databerita as $berita) : ?>
                <tr>
                    <td align="center"><?php echo $berita['judul_berita'] ?></td>
                    <td align="center"><?php echo $berita['kategori_berita'] ?></td>
                    <td align="center"><?php echo $berita['penulis_berita'] ?></td>
                    <td align="center"><?php echo $berita['hari_berita'] ?></td> 
                    <td align="center"><?php echo tglindo($berita['tanggal_berita']) ?></td> 
                    <td align="center">
                        <a href="" class="btn btn-teal btn-with-icon" data-toggle="modal" data-target="#detailfotoberita">
                          <div class="ht-20 justify-content-between">
                            <span><i class="ion ion-eye tx-30"></i></span>
                            <span class="pd-x-5">Lihat Detail</span>
                          </div>
                        </a>
                    </td> 
                    <td width="5%">
                    <a href="editberita.php?id_berita=<?php echo $berita['id_berita']; ?>" class="btn btn-warning btn-icon" onClick="return confirm('Anda yakin akan mengedit berita ini?');"><div><i class="ion ion-compose tx-40" align="center"></i></div></a></td>
                    <td width="5%">
                    <a href="hapusberita.php?id_berita=<?php echo $berita['id_berita']; ?>" class="btn btn-danger btn-icon" onClick="return confirm('Anda yakin akan menghapus berita ini?');"><div><i class="ion ion-trash-a tx-40" align="center"></i></div></a></td>

                </tr>
                </tbody>
                <?php  endforeach ?>
            </table>
            <?php endif ?> 
            </div>
        </div>
        </div>

        <!-- Start Detail Berita -->
          <div id="detailfotoberita" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-20 mg-b-0 tx-uppercase tx-inverse tx-bold">DETAIL BERITA</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-10">
                  <img src="img_berita/<?php echo $berita['foto_berita']; ?>" class="img-fluid rounded" alt="" width="100%">
                </div>
                <div class="modal-body pd-10">
                  <h4 class="lh-3 mg-b-20 tx-inverse" align="center">-- <?php echo $berita['judul_berita'] ?> --</h4>
                </div>
                <div class="modal-body pd-10">
                  <h4 class="lh-3 mg-b-20 tx-inverse">* ISI BERITA</h4>
                  <p class="mg-b-5" align="justify">Dipublikasi: <?php echo $berita['hari_berita'] ?>, <?php echo tglindo($berita['tanggal_berita']) ?></p>
                  <p class="mg-b-5" align="justify"><?php echo $berita['isi_berita'] ?></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger tx-size-xs" data-dismiss="modal">TUTUP</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Detail Berita -->

      </div>
    </div>

<?php 
include 'lampiran.php';
?>