<!DOCTYPE html>
<html>

<head>
  <title>HTML Login Form</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body>
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
  <div class="main">
    <img src="logo-polinema.png" alt="logo-polinema" class="logo" width="135px">
    <form action="form-floating mb-3 mt-3">
      <label for="first">
        Username:
      </label>
      <input type="text" id="first" name="first" placeholder="Masukan Email Anda" required>

      <label for="password">
        Kode Verifikasi:
      </label>
      <input type="text" id="firt" name="first" placeholder="Masukan Kode Verifikasi" required>

      <div class="wrap">
        <button type="submit" onclick="solve()" formaction="verifikasi_sandi.php">
          OK
        </button>
      </div>
    </form>
    <div>
      <p>Kirim Ulang Kode Verifikasi <a style="text-decoration: none;" href="#"><i class="ri-restart-line"></i></a></p>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>