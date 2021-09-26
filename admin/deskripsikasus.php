<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
  include "../includes/connection.php";
  include "formattanggal.php";
	$id_kasus=$_GET['id_kasus'];
	$hasil=mysqli_query($db,"SELECT * FROM kasus WHERE id_kasus='$id_kasus'");
	while($datakasus=mysqli_fetch_array($hasil)){
?>

<div class="modal d-block pos-static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content  mg-b-0">

    <div class="modal-header">
        <h5 class="modal-title">Detail Kasus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="br-msg-body mg-t-20">
          <h6 class="tx-inverse mg-b-25 lh-4">Tanggal <?php echo tglindo($datakasus['tgl_kasus']) ?></h6>

              <p>Kepada Yth.<br>
              <strong>Kantor Konsultan/Advokat,</strong><br>
              Di -<br>Tempat</p>

              <p class="tx-14 tx-medium tx-justify tx-black">Deskripsi Kasus: 
              <textarea style="resize:none; width:100%; height:300px; font-size: 14px; border-style: none;" disabled>Judul Kasus: <?php echo $datakasus['jd_kasus'] ?>, <?php echo $datakasus['dk_kasus'] ?></textarea></p><p>Mohon kesediaannya untuk kasus terkait dapat ditindak lanjuti. Sekian & Terima Kasih</p><br><br>
              <p>Pemohon,<br><?php echo $datakasus['nm_pmohon'] ?></p>
            </div><!-- br-msg-body -->
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger active btn-with-icon"data-dismiss="modal" aria-hidden="true"><span class="pd-x-15 pd-y-20 tx-spacing-5">Tutup</span></button>
              </div>
             <?php } ?>

        </div>           
    </div>
</div>
</div><!-- modal -->

