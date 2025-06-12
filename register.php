<?php
require 'connect.php';

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
  $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';

  if (!empty($username) && !empty($password)) {
    $query_sql = "INSERT INTO data_login (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $query_sql)) {
      header("Location: login.php");
      exit;
    } else {
      $error_message = "Pendaftaran Gagal: " . mysqli_error($conn);
    }
  } else {
    $error_message = "Semua kolom harus diisi!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - BRAINTEKNO</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f4f4;
      font-family: 'Poppins', sans-serif;
    }

    .form-box {
      background-color: white;
      max-width: 400px;
      margin: 100px auto;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    }

    .form-box h1 {
      font-size: 32px;
      font-weight: 600;
      color: #007bff;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px;
      font-size: 16px;
      background-color: #e6f0ff;
      border: 2px solid #007bff;
    }

    .btn-primary {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      margin-top: 10px;
    }

    .bottom-text {
      text-align: center;
      margin-top: 20px;
    }

    .bottom-text a {
      color: #007bff;
      text-decoration: none;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }

    .error-message {
      color: red;
      font-size: 14px;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <div class="form-box">
    <h1>BRAINTEKNO</h1>
    <form method="POST" action="">
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <button type="submit" name="register" class="btn btn-primary">Register</button>

      <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
      <?php endif; ?>

      <div class="bottom-text">
        <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>