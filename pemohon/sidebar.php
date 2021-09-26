<div class="br-logo">
  <a href="profil.php">
    <table align="left">
      <tr>
        <td><img src="foto/<?php echo $_SESSION['user']['foto']; ?>" class="img-fluid rounded-circle" style="width: 55px; height: 55px; float: left; background: #F49917; border-radius: 5px;"></td>
        <td class="tx-semi-bold tx-white tx-14 tx-spacing-0 pd-x-10 pd-y-10"><?php echo $_SESSION['user']['nm_pmohon']; ?><br><span class="tx-12"><em>Pemohon</em></span></td>
        </tr>
      </table>
  </a>
</div>
 
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigasi</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="beranda.php" <?php if($thisPage == "beranda") {echo "class='br-menu-link active'";} else{echo "class='br-menu-link'";}?>>
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Beranda</span>
          </a>
        </li>

        <li class="br-menu-item">
          <a href="#" <?php if($thisPage == "lihatkasus"){echo "class='br-menu-link with-sub show-sub active'";} if($thisPage == "tambahkasus"){echo "class='br-menu-link with-sub show-sub active'";} else{echo "class='br-menu-link with-sub'";}?>>
            <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
            <span class="menu-item-label">Kelola Kasus</span>
          </a>
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="lihatkasus.php" <?php if($thisPage == "lihatkasus") {echo "class='sub-link active'";} else{echo "class='sub-link'";}?>>Lihat Kasus</a></li>
            <li class="sub-item"><a href="tambahkasus.php" <?php if($thisPage == "tambahkasus") {echo "class='sub-link active'";} else{echo "class='sub-link'";}?>>Tambah Kasus</a></li>
           </ul>
        </li>

        <li class="br-menu-item">
          <a href="lihatjadwal.php" <?php if($thisPage == "lihatjadwal") {echo "class='br-menu-link active'";} else{echo "class='br-menu-link'";}?>>
            <i class="menu-item-icon icon ion-ios-calendar-outline tx-24"></i>
            <span class="menu-item-label">Jadwal Konsultasi</span>
          </a>
        </li>

        <li class="br-menu-item">
          <a href="profil.php" <?php if($thisPage == "profil") {echo "class='br-menu-link active'";} else{echo "class='br-menu-link'";}?>>
            <i class="menu-item-icon icon ion-ios-contact-outline tx-24"></i>
            <span class="menu-item-label">Profil</span>
          </a>
        </li>

        <li class="br-menu-item">
          <a href="../logout.php" class="br-menu-link">
            <i class="menu-item-icon icon ion-log-out tx-24"></i>
            <span class="menu-item-label">Logout</span>
          </a>
        </li>
      </ul>
      <br>
    </div>