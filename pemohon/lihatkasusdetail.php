
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
