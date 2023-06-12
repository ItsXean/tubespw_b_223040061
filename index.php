<?php

require "admin/functions.php";


$queryProduk = mysqli_query($con, "SELECT * FROM produk");
// query kategori
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// get produk by nama produk/menu search
if (isset($_GET['keyword'])) {
  $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}

// get produk by kategori
else if (isset($_GET['kategori'])) {
  $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
  $kategoriId = mysqli_fetch_array($queryGetKategoriId);

  // query produk
  $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
}

// get produk default
else {
  $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,800;0,900;1,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><span class="text-danger">Lit</span>Recipe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-3 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#carouselExampleCaptions">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#list">Food List</a>
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
                    <input type="text" class="form-control" id="searchInput" placeholder="Type..." aria-label="Search">
                    <button class="btn btn-primary btn-dark" type="button" id="searchInput" onkeyup="searchKategori()">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/indonesia.png" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <p><a href="#list" class="btn btn-danger mt-3">LOOK RECIPE</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/Japan.png" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <p><a href="#list" class="btn btn-danger mt-3">LOOK RECIPE</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/amerika.png" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <p><a href="#list" class="btn btn-danger mt-3">LOOK RECIPE</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/korea.png" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <p><a href="#list" class="btn btn-danger mt-3">LOOK RECIPE</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--About section-->
  <section id="about" class="about section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-12">
          <div class="about-img">
            <img src="img/food.jpeg" alt="" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <h2>We Education Many<br>Food Recipe</h2>
            <p>Lit Recipe is a web to education people how to make some famous food from several country who have delicious food</p>
            <a href="#" class="btn btn-danger">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-gallery">
    <div class="gallery-container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-1">
            <h1 id="food-list">Food list</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

 
  <section id="list" class="gallery section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-5 mt-2">
          <h3 class="fw-bold">Kategori</h3>
          <ul class="list-group">

            <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
              <a class="text-decoration-none" href="index.php?kategori=<?php echo $kategori['nama']; ?>">
                <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
              </a>
            <?php } ?>
          </ul>
        </div>

        <!-- Card Produk -->
        <div class="col-lg-9 mt-2">
          <h3 class="text-center fw-bold mb-2">Produk</h3>
          <div class="row" id="container">
            <?php
            if ($countData < 1) {
            ?>
              <!-- tampil alert ketika barang yang dicari tidak tersedia -->
              <h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
            <?php
            }
            ?>

            <!--  -->
            <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
              <div class="col-md-4 mb-5 text-center">
                <div class="card h-100">
                  <div class="image-box">
                    <img src="img/<?php echo $produk['foto']; ?>" class="card-img-top" alt="">
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                    <a href="detail.php?id=<?php echo $produk['id']; ?>" class="btn bg-danger text-light">Detail</a>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>

  </section>


  <!--Social Media-->
  <section id="social-media" class="social section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Our Social Media</h2>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body">
              <img src="img/logofood.png" alt="" class="img-fluid rounded-circle">
              <h3 class="card-title py-2">Litrecipe_</h3>
              <p class="socials">
                <a href=""><i class="fa-brands fa-instagram text-dark mx-1"></i></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Footer-->
  <footer class="bg-dark p-2 m-0 text-center">
    <div class="container">
      <p class="text-white">All Right Reserved @Arrizal</p>
    </div>
  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>