<?php 



/**
 * Menampilkan semua error kecuali error dengan jenis "Notice"
 */
error_reporting(E_ALL & ~E_NOTICE);


session_start();

require_once ("includes/connection.php");
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Cek login

$username = input(trim($_POST['username']));
$password = input(md5($_POST['password']));

if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
// Validation: Checking entered captcha code with the generated captcha code
if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){

    echo "<script type='text/javascript'>
          alert('Captcha Anda Salah!');
          history.back(self);
          </script>";
    
  }else{

        $query = "SELECT * FROM admin WHERE username = '$username' limit 1";
        $hasil = mysqli_query($db, $query);
        $data_user = mysqli_fetch_assoc($hasil);
        if ($data_user != null) {
            if ($password == $data_user['password']) {
                $_SESSION['user'] = $data_user;
                if ($data_user['level'] == 'admin') {
                  $_SESSION['id'] = $data_user['id'];
                  $_SESSION['username'] = $username;
                  header('Location: admin/beranda.php');
                }
                else {
                  echo "<script type='text/javascript'>
                  alert('Username Atau Password Anda Salah!');
                  history.back(self);
                  </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                  alert('Username Atau Password Anda Salah!');
                  history.back(self);
                  </script>";
            }
        }
        else if($data_user == null){
        $query1 = "SELECT * FROM konsultan WHERE username = '$username'";
        $hasil1 = mysqli_query($db, $query1);
        $data_user1 = mysqli_fetch_assoc($hasil1);
        if ($data_user1 != null) {
            if ($password == $data_user1['password']) {
                $_SESSION['user'] = $data_user1;
                if ($data_user1['level'] == 'konsultan') {
                  $_SESSION['id_kontan'] = $data_user1['id_kontan'];
                  $_SESSION['nm_kontan'] = $data_user1['nm_kontan'];
                  $_SESSION['username'] = $username;
                  $_SESSION['foto'] = $data_user1['foto'];
                  header('Location: konsultan/beranda.php');
                }
                else {
                  echo "<script type='text/javascript'>
                  alert('Username Atau Password Anda Salah!');
                  history.back(self);
                  </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                  alert('Username Atau Password Anda Salah!');
                  history.back(self);
                  </script>";
            }
        }else{
          $query2 = "SELECT * FROM pemohon WHERE username = '$username'";
          $hasil2 = mysqli_query($db, $query2);
          $data_user2 = mysqli_fetch_assoc($hasil2);
          if ($data_user2 != null) {
              if ($password == $data_user2['password']) {
                  $_SESSION['user'] = $data_user2;
                  if ($data_user2['level'] == 'pemohon') {
                    $_SESSION['id_pmohon'] = $data_user2['id_pmohon'];
                    $_SESSION['nm_pmohon'] = $data_user2['nm_pmohon'];
                    $_SESSION['username'] = $username;
                    $_SESSION['foto'] = $data_user2['foto'];
                    header('Location: pemohon/beranda.php');
                  }
                  else {
                    echo "<script type='text/javascript'>
                    alert('Username Atau Password Anda Salah!');
                    history.back(self);
                    </script>";
                  }
              } else {
                  echo "<script type='text/javascript'>
                    alert('Username Atau Password Anda Salah!');
                    history.back(self);
                    </script>";
              }
          }else {
              echo "<script type='text/javascript'>
                    alert('Akun anda tidak terdaftar pada sistem!');
                    history.back(self);
                    </script>";
              }
          }
        }


        else {
            echo "<script type='text/javascript'>
                  alert('Akun anda tidak terdaftar pada sistem!');
                  history.back(self);
                  </script>";
            }
    }

  }
}


//Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>