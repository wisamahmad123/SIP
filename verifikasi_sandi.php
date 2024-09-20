<!DOCTYPE html>
<html>

<head>
  <title>HTML Login Form</title>
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

  .main {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 10px 20px;
    transition: transform 0.2s;
    width: 500px;
    text-align: center;
  }

  h1 {
    color: #4CAF50;
  }

  label {
    display: block;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: left;
    color: #555;
    font-weight: bold;
  }


  input {
    display: block;
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
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

  .wrap {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  </style>
  <div class="main">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzBSUfBxD_sQPeHij6Oyxu_6HHvOCPu_fivg&s" alt="">
    <form action="">
      <label for="first">
        Nama Pengguna:
      </label>
      <input type="text" id="first" name="first" placeholder="Masukan Nama Anda" required>

      <label for="first">
        Email:
      </label>
      <input type="text" id="first" name="first" placeholder="Masukan Email Anda" required>

      <label for="password">
        Kata Sandi:
      </label>
      <input type="password" id="password" name="password" placeholder="Masukan Kata Sandi Anda" required>

      <label for="password">
        Ulangi Kata Sandi:
      </label>
      <input type="password" id="password" name="password" placeholder="Ulangi Kata Sandi Anda" required>

      <div class="wrap">
        <button type="submit" onclick="solve()" formaction="login.php">
          OK
        </button>
      </div>
    </form>
  </div>
</body>

</html>