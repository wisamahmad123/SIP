<?php 
session_start();
include 'sidebar.php';
require_once '../config.php';
include '../crud.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan Pelanggan Polinema</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menambahkan font Poppins */
            background-color: #f8f9fa;
        }
        .container {
            padding-right: 90px;
            background-color: #f8f9fa;
        }
        .welcome-message {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 5px;
            text-align: center;
        }
        .welcome-message h1 {
            font-weight: bold;
        }
        .welcome-message p {
            text-align: justify;    
        }
        
    </style>
</head>
<body>
<div class="container">
        <div class="welcome-message">
            <h1>Selamat Datang Di Website Survey Kepuasan Pelanggan Politeknik Negeri Malang</h1>
            <p>Politeknik Negeri Malang adalah institusi pendidikan tinggi vokasi yang terletak di kota Malang. Malang adalah kota terbesar kedua di Jawa Timur, Indonesia. Malang merupakan kota yang nyaman untuk belajar karena udaranya yang sejuk dan populasi yang tidak begitu padat (sekitar 800 ribu penduduk). Di Malang terdapat banyak sekolah, universitas dan institusi pendidikan dengan kualitas yang bagus.</p>
            <p>Polinema terus berkembang untuk menjadi institusi pendidikan vokasi yang superior dan siap bersaing di dunia global. Polinema memiliki sistem pendidikan yang inovatif dan keterampilan yang secara global dibutuhkan oleh industri, badan pemerintahan dan masyarakat. Polinema mendukung penelitian terapan dan pengabdian masyarakat dalam bidang ilmu pengetahuan, pengembangan teknologi serta kesejahteraan masyarakat. Polinema juga berkomitmen untuk melaksanakan sistem manajemen pendidikan dengan prinsip pemerintahan yang baik. Kami yakin bahwa atmosfer akademik yang kondusif sangat penting untuk memperbaiki kualitas sumber daya manusia dan pengajaran yang mendukung belajar sepanjang hayat dan pertumbuhan wirausaha.</p>
        </div>
    </div>
</body>
</html>
