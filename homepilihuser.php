<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User - Politeknik Negeri Malang</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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
        .container.content {
            text-align: center;
            padding: 50px 15px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 32px;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .user-category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .user-category {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 15px;
            text-align: center;
            width: 150px;
            padding: 20px;
            transition: transform 0.2s;
        }

        .user-category:hover {
            transform: scale(1.05);
        }

        .user-category img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .user-category p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm">
        <div class="logo">
            <img src="assets/images/logo-polinema.png" alt="Logo Polinema">
        </div>
        <div class="container-fluid">
            <p class="navbar-brand mb-0">POLITEKNIK NEGERI MALANG</p>
        </div>
    </nav>

    <div class="container content">
        <h2>Pilih Kategori User</h2>
        <div class="user-category-container">
            <a href="login.php?kategori_user_id=2" class="user-category">
                <img src="assets/images/dosen.png" alt="Dosen">
                <p>Dosen</p>
            </a>
            <a href="login.php?kategori_user_id=3" class="user-category">
                <img src="assets/images/tendik.png" alt="Tendik">
                <p>Tendik</p>
            </a>
            <a href="login.php?kategori_user_id=4" class="user-category">
                <img src="assets/images/mahasiswa.png" alt="Mahasiswa">
                <p>Mahasiswa</p>
            </a>
            <a href="login.php?kategori_user_id=5" class="user-category">
                <img src="assets/images/alumni.png" alt="Alumni">
                <p>Alumni</p>
            </a>
            <a href="login.php?kategori_user_id=6" class="user-category">
                <img src="assets/images/orangtua.png" alt="Orang Tua">
                <p>Orang Tua</p>
            </a>
            <a href="login.php?kategori_user_id=7" class="user-category">
                <img src="assets/images/industri.png" alt="Industri">
                <p>Industri</p>
            </a>
        </div>
    </div>
</body>
</html>
