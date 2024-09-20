<?php
session_start();
require_once 'config.php';
include 'crud.php';

if (isset($_GET['kategori_user_id'])) {
    $_SESSION['kategori_user_id'] = $_GET['kategori_user_id'];
}

$crud = new Crud();
$db = new Database();
$conn = $db->__construct();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT user_id, kategori_user_id, password FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['kategori_user_id'] = $user['kategori_user_id'];
            $_SESSION['user_id'] = $user['user_id'];

            // Redirect based on kategori_user_id
            if ($user['kategori_user_id'] == 1) {
                header("Location: admin/index.php");    
            } else {
                header("Location: user/homeuser.php");
            }
            exit();
        } else {
            $error = "Username atau password salah";
        }
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
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
            border-radius: 35px;
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
    </style>
</head>
<body>
<div class="main">
<?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <div class="login-container">
        <img src="logo-polinema.png" alt="logo-polinema" class="logo" width="135px">
        <form method="post" action="">
        <input type="hidden" name="user_type" value="<?php echo isset($_GET['type']) ? $_GET['type'] : ''; ?>">
            <div class="form-floating mb-3 mt-3"> 
                <input type="text" class="form-control" id="username" placeholder="Email/Nama Pengguna" name="username" required>
                <label for="username">Email/Nama Pengguna</label>
            </div>
            <div class="form-floating mb-3 mt-3"> 
                <input type="password" class="form-control" id="password" placeholder="Kata Sandi" name="password" required>
                <label for="password">Kata Sandi</label>
            </div>
            <div class="wrap">
                <button type="submit">Masuk</button>
            </div>
        </form>
        <div class="link-container">
            <a href="forgot_password.php" style="text-decoration: none;">Lupa Kata Sandi?</a>
            <p></p>
            <a href="register.php" style="text-decoration: none;">Belum Punya Akun?</a>
        </div>
    </div>
</div>
<p class="footer">2024 Survey Kepuasan Pelanggan Politeknik Negeri Malang</p>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
