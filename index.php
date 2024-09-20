<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Survey Kepuasan Pelanggan</title>
    <style>
        h1 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: black;
        }
        h4 {
            color: black;
            margin: 10px 0;
        }
        p {
            text-align: center;
            font-size: 1.2rem;
            color: black;
        }
        body {
            background-image: url('assets/images/gedung-aa-polinema.jpg');
            background-size: 120%; 
            background-position: center;
            background-repeat: repeat; 
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #0F3AA6; 
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo img {
            height: 65px; 
        }
        .masuk-btn {
            background-color: #0F3AA6; 
            color: white;
            padding: 8px 12px;
            border: 1px solid white; /* Added white border */
            cursor: pointer;
            border-radius: 5px;
            position: relative;
        }
        .content {
            text-align: center;
            padding: 100px 20px;
            margin: 10px auto;
            border-radius: 8px;
            max-width: 800px;
        }
        .popup {
            display: none; 
            position: absolute; 
            top: 60px; 
            right: 10px; 
            background-color: white;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 100000;
            width: 150px;
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }
        .popup.active {
            display: block;
            transform: translateY(0);
            opacity: 1;
        }
        .popup-content {
            text-align: center;
        }
        .popup-content a {
            display: block;
            padding: 10px 0;
            color: black;
            text-decoration: none;
        }
        .popup-content a:first-child {
            border-bottom: 1px solid black;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
    <script>
        function openPopup() {
            document.getElementById('popup').classList.add('active');
        }
        function closePopup() {
            document.getElementById('popup').classList.remove('active');
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-sm">
        <div class="logo">
            <img src="assets/images/logo-polinema.png" alt="Logo Polinema">
        </div>
        <div class="container-fluid">
            <p class="navbar-brand mb-0">POLITEKNIK NEGERI MALANG</p>
        </div>
        <button class="masuk-btn" onclick="openPopup()">Masuk</button>
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <h4>Pilih Pengguna</h4>
                <a href="homepilihuser.php">Pengguna</a>
                <a href="login.php?kategori_user_id=1">Admin</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <h1>Survey Kepuasan Pelanggan <br> Politeknik Negeri Malang</h1>
        <p>Mengukur kepuasan dan meningkatkan kualitas layanan serta fasilitas <br> Politeknik Negeri Malang agar menjadi lebih baik</p>
    </div>
</body>
</html>
