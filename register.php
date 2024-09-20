<?php
session_start();
require_once 'config.php'; // Ensure this file contains the database connection setup
require_once 'crud.php'; // Ensure this file contains necessary CRUD functions

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Enkripsi password
    $kategori_user_id = isset($_POST["kategori_user_id"]) ? $_POST["kategori_user_id"] : null;

    // Periksa apakah kategori_user_id diisi
    if (!$kategori_user_id) {
        $_SESSION['error'] = "Kategori pengguna harus dipilih.";
        header("Location: register.php"); // Ganti dengan halaman yang sesuai
        exit();
    }

    // Query INSERT ke database
    $sql = "INSERT INTO user (kategori_user_id, username, email, password, level) VALUES (?, ?, ?, ?, 'user')";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isss", $kategori_user_id, $username, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registrasi berhasil, silakan verifikasi email Anda.";
            echo '<script>document.addEventListener("DOMContentLoaded", function() { openPopup(); });</script>';
        } else {
            $_SESSION['error'] = "Registrasi gagal, silakan coba lagi.";
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleregister.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>SIGN UP</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            line-height: 1.5;
            min-height: 100vh;
            background: #123EAE;
            flex-direction: column;
            margin: 0;
        }
        button {
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: none;
            color: white;
            cursor: pointer;
            background-color: #0F3AA6;
            width: 100%;
            font-size: 16px;
        }
        .main {
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 60px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .link-container {
            text-align: center;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #888;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
        }
        .footer {
            position: fixed;
            bottom: 1px;
            left: 30px;
            color: rgb(255, 255, 255);
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 6px 20px;
            border: 1px;
            border-radius: 4px;
            cursor: pointer;
            align-self: center;
        }
        button:hover {
            background-color: #001c3a;
        }
        .login-container {
            width: 350px;
            margin: 100px auto;
            padding: 10px;
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .logo {
            display: block;
            margin: 4%;
            max-width: 70%;
            height: auto;
        }
        .button-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding-left: 40px;
        }
        .form-group input, .form-group textarea {
            width: calc(100% - 24px);
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .popup .button {
            background: #0056b3;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="post">
            <div class="form-floating mb-3 mt-3"> 
                <input type="text" class="form-control" id="username" placeholder="Nama Pengguna" name="username" required>
                <label for="username">Nama Pengguna</label>
            </div>
            <div class="form-floating mb-3 mt-3"> 
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                <label for="email">Email</label>
            </div>
            <select class="status" name="kategori_user_id" id="kategori_user_id">
                <option value="5">Alumni</option>
                <option value="2">Dosen</option>
                <option value="4">Mahasiswa</option>
                <option value="7">Industri</option>
                <option value="6">Orang Tua</option>
                <option value="3">Tendik</option>
            </select>
            <div class="form-floating mb-3 mt-3"> 
                <input type="password" class="form-control" id="password" placeholder="Kata Sandi" name="password" required>
                <label for="password">Kata Sandi Baru</label>
            </div>
            <div class="form-floating mb-3 mt-3"> 
                <input type="password" class="form-control" id="repeat_password" placeholder="Ulangi Kata Sandi" name="repeat_password" required>
                <label for="repeat_password">Ulangi Kata Sandi</label>
            </div>
            <div class="container-fluid">
                <button class="btn btn-primary" type="submit" name="submit">Registrasi</button>
            </div>
        </form>
    </div>
    <div id="popup" class="popup">
        <p>Anda telah berhasil registrasi<br>Silahkan Masuk kembali!</p>
        <a href="login.php" class="button">OK</a>
    </div>
    <p class="footer">2024 Survey Kepuasan Pelanggan Politeknik Negeri Malang</p>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
