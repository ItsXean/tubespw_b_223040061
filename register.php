<?php

session_start(); // Mulai session

require "admin/functions.php";

// Fungsi untuk melakukan registrasi user
function registerUser($username, $password, $password2)
{
    $conn = koneksi(); // Membuat koneksi ke database

    // Melakukan validasi input

    // Cek apakah password dan konfirmasi password sesuai
    if ($password != $password2) {
        return "Password dan konfirmasi password tidak sesuai";
    }

    // Melakukan sanitasi input untuk mencegah SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Cek apakah username sudah terdaftar sebelumnya
    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        return "Username sudah terdaftar";
    }

    // Hash password sebelum disimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data user baru ke database
    $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        return "Registrasi berhasil";
    } else {
        return "Registrasi gagal";
    }

    mysqli_close($conn); // Menutup koneksi ke database
}

// Memproses data registrasi jika tombol submit ditekan
if (isset($_POST["submit"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $password2 = htmlspecialchars($_POST["password2"]);

    $result = registerUser($username, $password, $password2);

    echo "<script>alert('$result'); window.location.href='login.php';</script>";
    exit();
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
    <title>Register Pages</title>
</head>

<body>
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>

                <div class="card-body">
                    <h4 class="title text-center mt-4">
                        Register
                    </h4>
                    <form class="form-box px-3" method="POST" action="">
                        <div class="form-input">
                            <span><i class="fa fa-envelope-o"></i></span>
                            <input type="text" name="username" placeholder="Username" tabindex="10">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password2" placeholder="Konfirmasi Password">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-block text-uppercase">
                                Registrer
                            </button>
                        </div>

                        <hr class="my-4">

                        <div class="text-center mb-2">
                            Sudah memiliki akun?
                            <a href="login.php" class="register-link">
                                Login disini
                            </a>
                        </div>
                        <div class="text-center mb-2">
                            <a href="home.php" class="register-link">
                                Kembali
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>