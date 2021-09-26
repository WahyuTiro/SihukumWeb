<?php 
session_start();

require_once 'includes/connection.php';
$query = "SELECT * FROM berita";
$hasil = mysqli_query($db, $query);
$databerita = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $databerita[] = $row;
}
$thisPage = "berita";
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
                            <li class="breadcrumb-item"><a href="berita?">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> 
    </div> 
</section>
<!--====== Banner Bagian Akhir ======-->

    <section id="blog-singel" class="pt-30 pb-120 gray-bg">
        <div class="container">
           <div class="row">
            <?php foreach ($databerita as $berita) : ?>
              <div class="col-lg-8">
                  <div class="blog-details mt-30">
                      <div class="thum">
                           <img src="admin/img_berita/<?php echo $berita['foto_berita']; ?>" class="img-fluid rounded" alt="" width="100%">
                      </div>
                      <div class="cont">                          
                           <h3><?php echo $berita['judul_berita'] ?></h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>Dipublikasi: <?php echo $berita['hari_berita'] ?>, <?php echo tglindo($berita['tanggal_berita']) ?></a></li>
                               <li><a href="#"><i class="fa fa-user"></i>Oleh: <?php echo $berita['penulis_berita'] ?></a></li>
                               <li><a href="#"><i class="fa fa-tags"></i><?php echo $berita['kategori_berita'] ?></a></li>
                           </ul>
                           <p align="justify"><?php echo $berita['isi_berita'] ?></p>
                           <ul class="share">
                               <li class="title">Bagikan :</li>
                               <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                           </ul>
                      
                      </div> <!-- cont -->
                  </div> <!-- blog details -->
              </div>

               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row"><!-- 
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-search mt-30">
                                   <form action="#">
                                       <input type="text" placeholder="Search">
                                       <button type="button"><i class="fa fa-search"></i></button>
                                   </form>
                               </div>
                               <div class="categories mt-30">
                                   <h4>Categories</h4>
                                   <ul>
                                       <li><a href="#">Fronted</a></li>
                                       <li><a href="#">Backend</a></li>
                                       <li><a href="#">Photography</a></li>
                                       <li><a href="#">Teachnology</a></li>
                                       <li><a href="#">GMET</a></li>
                                       <li><a href="#">Language</a></li>
                                       <li><a href="#">Science</a></li>
                                       <li><a href="#">Accounting</a></li>
                                   </ul>
                               </div>
                           </div>  -->
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>Berita Terbaru</h4>
                                   <ul>
                                       <li>
                                            <a href="#">
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
        </div> <!-- container -->
    </section>

<!--====== Kontak Bagian Akhir ======-->
<?php 
require_once 'includes/footer.php';
require_once 'includes/lampiran.php';
?>
