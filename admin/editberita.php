<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
include '../includes/connection.php';
$thisPage = "lihatberita";
$id_berita = $_GET['id_berita'];
$query = "SELECT * FROM berita WHERE id_berita='$id_berita'";
$hasil = mysqli_query($db, $query);
$databerita = mysqli_fetch_assoc($hasil);
include 'head.php';
include 'sidebar.php';
include 'header.php';
?>
  <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-world-outline"></i>
        <div>
          <h4>Edit Berita</h4>
          <p class="mg-b-0">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</p>
        </div>
      </div>

  <div class="br-pagebody">
        <div class="br-section-wrapper">
         <div class="btn-demo">
         <form method="post" action="proseseditberita.php" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_berita" value="<?php echo $databerita['id_berita']; ?>">
                <p>Judul Berita</p>
                <p><input class="form-control" type="text" name="judul_berita" required value="<?php echo $databerita['judul_berita']; ?>"></p>
                <p>Permalink</p>
                <p><input class="form-control" type="text" name="permalink" placeholder="*Contoh: ini-permalink-berita" required value="<?php echo $databerita['permalink']; ?>"></p>
                <p>Kategori Berita</p>
                <p>
                <select class="form-control select2" type="text" name="kategori_berita" data-placeholder="Pilih Kategori Berita" required>
                  <option label="Pilih Kategori Berita" selected></option>
                  <option value="Hukum">Hukum</option>
                  <option value="Politik">Politik</option>
                  <option value="Teknologi">Teknologi</option>
                  <option value="Umum">Umum</option>
                </select>
                </p>
                <p>Penulis Berita</p>
                <p><input class="form-control" type="text" name="penulis_berita" value="<?php echo $databerita['penulis_berita']; ?>"></p>
                <p>Hari Publikasi</p>
                <p>
                <select name="hari_berita" type="text" class="form-control select2" data-placeholder="Pilih Hari Publikasi">
                  <option label="Pilih Hari Publikasi" selected><?php echo $databerita['hari_berita']; ?></option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jum'at">Jum'at</option>
                  <option value="Sabtu">Sabtu</option>
                </select>
                </p>
                <p>Tanggal Publikasi</p>
                <p><input class="form-control" type="date" name="tanggal_berita" value="<?php echo $databerita['tanggal_berita']; ?>"></p>
                <p>Upload Foto Berita <i>(Ukuran Gambar Maksimal 1Mb)</i></p>
                <p>
                      <div class="ht-200 bg-gray-200 d-flex align-items-center justify-content-center">
                        <input type="file" name="foto_berita" id="file-1" class="inputfile" data-multiple-caption="{count} files selected" multiple value="<?php echo $databerita['foto_berita']; ?>">
                        <label for="file-1" class="tx-white bg-info">
                          <i class="icon ion-ios-upload-outline tx-24"></i>
                          <span><?php echo $databerita['foto_berita']; ?></span>
                        </label>
                      </div>
                </p>
                <p>Isi Berita</p>
                <p><textarea id="summernote" class="summernote" type="text" name="isi_berita"><?php echo $databerita['isi_berita']; ?></textarea></p>           
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