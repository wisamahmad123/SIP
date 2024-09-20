<?php 
session_start();
require_once '../config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
</head>

<body>
  <?php include("includes/header.php") ?>
  <?php include("includes/penilaian-saran.php") ?>
  <?php include("includes/footer.php") ?>
</body>

<body>
  <?php include("includes/header.php") ?>
  <?php include("includes/footer.php") ?>
</body>

</html>