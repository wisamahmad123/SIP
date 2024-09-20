  <?php 
  session_start();
  require_once '../config.php';
  include '../crud.php';
  include 'includes/header.php';

  if (!isset($_SESSION['username'])) {
      header("Location: ../login.php");
      exit();
  }
  ?>

  
<section class="content-header">
  <div class="content-header-left">
    <h1>Halo Admin</h1>
    <p>Di sinilah kekuatan Anda sebagai pengelola layanan terdepan. Dengan penuh semangat, mari kita jelajahi data,
      identifikasi tren, dan jadikan setiap tanggapan sebagai batu loncatan menuju pelayanan yang lebih baik. Bersama,
      kita akan membentuk masa depan yang lebih cerah bagi Politeknik Negeri Malang.
      Ayo, mulai sekarang!</p>
  </div>
</section>
</html>