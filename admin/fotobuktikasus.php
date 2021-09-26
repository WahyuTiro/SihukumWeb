<?php 
    session_start(); 
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
}
include "../includes/connection.php";
$id_kasus=$_GET['id_kasus'];
$hasil=mysqli_query($db,"SELECT * FROM kasus WHERE id_kasus='$id_kasus'");
while($datakasus=mysqli_fetch_array($hasil)){
?>
<div class="modal d-block pos-static">
  <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header pd-y-20 pd-x-20">
        <h5 class="modal-title">Bukti Kasus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
                <div class="form-group" style="padding-bottom: 20px;">
                  <h4 class="lh-2 mg-b-10 tx-center"><a href="" class="tx-inverse hover-primary">Bukti Foto Kasus</a></h4>
                  <input type="hidden" name="id_kasus" id="edit-id"  class="form-control" value="<?php echo $datakasus['id_kasus']; ?>" />
                  <img src="img_kasus/<?php echo $datakasus['bk_kasus']; ?>" name="bk_kasus" class="img-fluid img-thumbnail align-self-center" width="100%" height="auto">
                </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger active btn-with-icon"data-dismiss="modal" aria-hidden="true"><span class="pd-x-15 pd-y-20 tx-spacing-5">Tutup</span></button>
              </div>
             <?php } ?>

        </div>           
    </div>
</div>
</div><!-- modal -->

