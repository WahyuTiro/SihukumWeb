<?php 
session_start();

require_once 'includes/connection.php';
$query = "SELECT * FROM berita";
$hasil = mysqli_query($db, $query);
$databerita = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $databerita[] = $row;
}

require_once 'includes/head.php';
require_once 'includes/header.php';
require_once 'includes/formattanggal.php';

?>   
<!--====== Banner Bagian Awal ======-->
<section id="page-banner" class="pt-105 pb-130 bg_cover" style="background-image: url(assets/images/banner.png)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Berita</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index?">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> 
    </div> 
</section>
<!--====== Banner Bagian Akhir ======-->

    <section id="blog-page" class="pt-30 pb-120 gray-bg">
        <div class="container">
           <div class="row">
            <?php foreach ($databerita as $berita) : ?>
               <div class="col-lg-8">
                   <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="admin/img_berita/<?php echo $berita['foto_berita']; ?>" class="img-fluid rounded" alt="" width="100%">
                       </div>

                       <div class="blog-cont">
                        <a href="detailberita?<?php echo $berita['permalink'];?>">
                           <h3><?php echo $berita['judul_berita'] ?></h3>
                       </a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>Dipublikasi: <?php echo $berita['hari_berita'] ?>, <?php echo tglindo($berita['tanggal_berita']) ?></a></li>
                               <li><a href="#"><i class="fa fa-user"></i>Oleh: <?php echo $berita['penulis_berita'] ?></a></li>
                               <li><a href="#"><i class="fa fa-tags"></i><?php echo $berita['kategori_berita'] ?></a></li>
                           </ul>
                            <p>Lorem ipsum pertama kali dipakai saat seorang tukang cetak yang tak dikenal mengambil sebuah kumpulan teks. Dia mengacak teks tersebut menjadi sebuah buku contoh huruf.</p>
                            <p>Namun teks ini baru populer pada 1960 dengan diluncurkannya lembaran letraset yang menggunakan kalimat tersebut. Popularitasnya makin menanjak seiring munculnya software publishing di komputer dekstop....</p><br>
                        <p style="text-align:right;">
                            <a href="detailberita?<?php echo $berita['permalink'];?>">
                                <button class="btn btn-primary">Selengkapnya</button>
                            </a>
                        </p>                       

                       </div>

                   </div> <!-- singel blog -->
               </div>

               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>Berita Terbaru</h4>
                                   <ul>
                                       <li>
                                            <a href="detailberita?<?php echo $berita['permalink'];?>">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="admin/img_berita/<?php echo $berita['foto_berita']; ?>" width="100px" height="100px">
                                                   </div>
                                                   <div class="cont">
                                                       <h6><?php echo $berita['judul_berita'] ?></h6>
                                                       <span><?php echo tglindo($berita['tanggal_berita']) ?></span>
                                                   </div>
                                               </div> <!-- singel post -->
                                            </a>
                                       </li>
                                       <li>
                                            <a href="detailberita?<?php echo $berita['permalink'];?>">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="admin/img_berita/<?php echo $berita['foto_berita']; ?>" width="100px" height="100px">
                                                   </div>
                                                   <div class="cont">
                                                       <h6><?php echo $berita['judul_berita'] ?></h6>
                                                       <span><?php echo tglindo($berita['tanggal_berita']) ?></span>
                                                   </div>
                                               </div> <!-- singel post -->
                                            </a>
                                       </li>
                                   </ul>
                               </div> <!-- saidbar post -->
                           </div>
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           <?php  endforeach ?>
           </div> <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="berita" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item">
                                <a href="berita" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->

        </div> <!-- container -->
    </section>


<!--====== Kontak Bagian Akhir ======-->
<?php 
require_once 'includes/footer.php';
require_once 'includes/lampiran.php';
?>
