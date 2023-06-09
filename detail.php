<?php 
require "admin/functions.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $queryDetail = mysqli_query($con, "SELECT * FROM produk WHERE id='$id'");
  $detail = mysqli_fetch_array($queryDetail);
  
  if (!$detail) {
    header("location: home.php");
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tubes PW</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,800;0,900;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <style>
    * {
      font-family: 'poppins', sans-serif;

    }

    body {
      background: white;
    }

    .section-padding {
      padding: 100px 0;
    }

    .navbar-nav a {
      font-size: 15px;
      text-transform: uppercase;
      font-weight: 500;
    }

    .navbar-light .navbar-brand {
      color: #000;
      font-size: 25px;
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 2px;
    }

    .navbar-light .navbar-brand:focus,
    .navbar-light .navbar-brand:hover {
      color: #000;
    }

    .navbar-light .navbar-nav .nav-link {
      color: #000;
    }

    .w-100 {
      height: 100vh;
    }

    .navbar-toggler {
      padding: 1px 5px;
      font-size: 18px;
      line-height: 0.3;
      background: #fff;
    }

    .container img {
      margin-top: 60px;
    }

    /*responsive CSS*/

    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .card {
        margin-bottom: 30px;
      }

      .img-area img {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      .navbar-nav {
        text-align: center;
      }

      .about-text {
        padding-top: 50px;
      }

      .card {
        margin-bottom: 30px;
      }

      @media only screen and (max-width: 768px) {

        .box-area {
          margin: 0 10px;

        }

        .left-box {
          height: 100px;
          overflow: hidden;
        }

        .right-box {
          padding: 20px;
        }
      }
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><span class="text-danger">Lit</span>Recipe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-3 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#food-list">Food List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#social-media">Social Media</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li>
            <div class="container">
              <div class="col-lg-8 offset-lg-20 mt-20">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type..." aria-label="Search">
                    <button class="btn btn-primary btn-dark" type="submit">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <!--Produk section-->
  <section id="about" class="about section-padding">
    <div class="container">
      <div class="row">


        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <h2 style="font-weight: bold;"><?= $detail['nama'] ?><br>Recipe</h2>
            
            <p>
            <h5>Bahan-bahan :</h5>
            <ul>
             <?php foreach(explode("\n", $detail['bahan']) as $bahan): ?>
                <li><?=$bahan; ?></li>
             <?php endforeach; ?>
           </ul>

            <h5 style="margin-top: 5px;">Langkah-langkah :</h5>
           <ol>
             <?php foreach(explode("\n", $detail['langkah']) as $langkah): ?>
                <li><?=$langkah; ?></li>
             <?php endforeach; ?>
           </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-white">All Right Reserved @Arrizal</p>
    </div>
  </footer>

  </br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>