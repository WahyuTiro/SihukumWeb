<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$kategori_berita=$_POST['kategori_berita'];
$query = "SELECT * FROM berita where kategori_berita='$kategori_berita'";

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
        <i class="icon ion-ios-person-outline"></i>
        <div>
          <h4>Lihat Berita</h4>
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
            Tidak ada data ditemukan.
            <?php else : ?>
            <table width="97%" class="table table-hover mg-b-0">
                <thead>
                <tr align="center">
                    <th>Judul Berita</th>
                    <th>Kategori Berita</th>
                    <th>Penulis Berita</th>
                    <th>Isi Berita</th>
                    <th>Foto Berita</th>
                    <th colspan="2">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($databerita as $berita) : ?>
                <tr align="center">
                    <td><?php echo $berita['judul_berita'] ?></td>
                    <td><?php echo $berita['kategori_berita'] ?></td>
                    <td><?php echo $berita['penulis_berita'] ?></td>
                    <td><?php echo $berita['isi_berita'] ?></td>
                    <td>
                      <img src="img_berita/<?php echo $berita['foto_berita']; ?>" class="img rounded" alt="" width="350px" height="250px" align="center">
                    </td>
                    <td width="5%">
                    <a href="editberita.php?id_berita=<?php echo $berita['id_berita']; ?>" class="btn btn-success btn-block" onClick="return confirm('Anda yakin ingin mengedit berita ini?');">Edit</a></td>
                    <td width="5%">
                    <a href="hapusberita.php?id_berita=<?php echo $berita['id_berita']; ?>" class="btn btn-danger btn-block" onClick="return confirm('Anda yakin ingin meghapus berita ini?');">Hapus</a></td>
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