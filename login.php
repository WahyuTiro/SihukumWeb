<?php

/**
 * Menampilkan semua error kecuali error dengan jenis "Notice"
 */
error_reporting(E_ALL & ~E_NOTICE);


// Mulai session 
session_start();

// Create a new CSRF token.
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

// Cek POST  valid.
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // POST data valid.
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html" ; charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</title>

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/icon">
  <!-- Bracket CSS -->
  <link rel="stylesheet" href="assets/css/bracket.css" type="text/css">
</head>

<body>
  
  <div class="row no-gutters flex-row-reverse ht-100v">
    <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center ">
      <!--
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      -->
      <form id="form" method="post" action="/proses-login?login" autocomplete="off">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
        <div class="login-wrapper wd-200 wd-xl-350 mg-y-20">
          <div class="signin-logo mg-b-20 tx-center tx-bold tx-inverse mg-t-50">
            <p><a href="index?home"><img src="assets/images/kop-logo.png" height="140px"></a></p>
            <span class="tx-primary tx-22">LOGIN</span>
          </div>

          <div class="form-group">
            <label class="d-block tx-14 tx-uppercase tx-medium tx-spacing-1">Username</label>
            <input autocomplete="off" type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required="required">
          </div>
          
          <div class="form-group">
            <label class="d-block tx-14 tx-uppercase tx-medium tx-spacing-1">Password</label> 
            <input autocomplete="off" type="password" class="form-control" name="password" id="password" minlength="8" placeholder="Masukan password" required="required">
          </div>

        <div class="form-group">
            <label class="d-block tx-14 tx-uppercase tx-medium tx-spacing-1">Kode Captcha</label> 
              <table width="100%">
                <tr>
                  <td width="95%"><input type="text" class="form-control" name="captcha" id="captcha" name="captcha" maxlength="6" placeholder="Masukan kode captcha" autocomplete="off" required="required"></td>
                  <td width="5%"><img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image' autocomplete="off"></td>
                </tr>
              </table>
          </div>

            <p class="tx-14">Gambar tidak bisa dibaca? <a href='javascript: refreshCaptcha();'> Klik Disini</a> untuk refresh</p>

        <div class="form-group mg-t-30">
          <button type="submit" class="btn btn-info btn-block tx-uppercase tx-12 tx-medium">Masuk</button>
          </div>

          <div class="copyright mg-t-20 tx-center tx-12">Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All Rights Reserved. Sistem Informasi Konsultasi Bantuan Hukum.</div>
        </div>
      </form>
    </div>


    <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
      <div class="wd-250 wd-xl-450 mg-y-30">
        <div class="signin-logo tx-28 tx-bold tx-white"><span class="tx-normal"></span> SI - <span class="tx-primary">HUKUM</span></div>
        <div class="tx-white tx-20 mg-b-50">Sistem Informasi Konsultasi Bantuan Hukum - Andi Walinga Yahya, SH. & Rekan</div>
        <h5 class="tx-white">Informasi Login</h5>
        <p class="tx-white-6 tx-justify">Login menggunakan <em>Username & Password</em> yang telah diberikan OPERATOR. Bagi yang belum memiliki username & password, harap datang ke kantor atau hubungi kami melalui OPERATOR</p>
        <p class="tx-white-6 tx-justify mg-b-60">Untuk <span> PARA REKAN KONSULTAN ataupun PEMOHON yang tidak bisa login, bisa ke kantor untuk meminta user dan password terbaru.</p>
        <a target="_blank" href="https://onedrive.live.com/redir?resid=CB2379FFF047E230%217221&authkey=%21AK3fagEa0Spy1BA&page=Download&canary=z8PghuaUWWNVO7cKJOYuZJEgyH70pyC7%2BolPCDY6dCw%3D5" class="btn btn-outline-teal pd-x-25 tx-uppercase tx-12 tx-spacing-5 tx-medium">PANDUAN PENGGUNA</a>

      </div>
    </div>

  </div>
  <style>
    .error {
      color: red;
    }
  </style>
  <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="assets/lib/jquery/jquery.validate.min.js" type="text/javascript"></script>
  <script src="assets/lib/jquery/app.js" type="text/javascript"></script>

    <script>
    window.csrf = { csrf_token: '<?php echo $_SESSION['csrf_token']; ?>' };

    $.ajaxSetup({
        data: window.csrf
    });

    $(document).ready(function() {
        // CSRF token is now automatically merged in AJAX request data.
        $.post('/awesome/ajax/url', { foo: 'bar' }, function(data) {
            console.log(data);
        });
    });
    </script>

  <script>
    //Refresh Captcha
    function refreshCaptcha(){
        var img = document.images['captcha_image'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
  </script>

  </body>
  </html>