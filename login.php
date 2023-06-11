<?php

session_start(); // Add this line to start the session

// Make sure the file path is correct relative to the login.php file
require "admin/functions.php";

if (isset($_POST["submit"])) {

  global $conn;
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);
  $conn = koneksi();
  $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
  $query = mysqli_query($conn, $sql);
  if ($query->num_rows > 0) {
    $user = mysqli_fetch_array($query);
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;

      if ($user['role'] == 'admin') {
        echo "<script>alert('Login berhasil!'); window.location.href='admin/kategori.php';</script>";
        exit(); // Add this line to stop script execution after the redirect
      } else {
        echo "<script>alert('Login berhasil!'); window.location.href='admin/kategori.php';</script>";
        exit(); // Add this line to stop script execution after the redirect
      }
    } else {
      echo "<script>alert('Username dan Password salah'); window.location.href='login.php';</script>";
      exit(); // Add this line to stop script execution after the redirect
    }
  } else {
    echo "<script>alert('Username dan Password salah'); window.location.href='login.php';</script>";
    exit(); // Add this line to stop script execution after the redirect
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <title>Login Pages</title>
</head>

<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-4">
            Login into account
          </h4>
          <form class="form-box px-3" method="POST" action="">
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="text" name="username" placeholder="Username Address" tabindex="10">
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="password" placeholder="Password">
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-block text-uppercase" name="submit">
                Login
              </button>
            </div>


            <hr class="my-4">

            <div class="text-center mb-2">
              Don't have an account?
              <a href="register.php" class="register-link">
                Register here
              </a>
            </div>
            <div class="text-center mb-2">
              <a href="home.php" class="register-link">
                Back
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>