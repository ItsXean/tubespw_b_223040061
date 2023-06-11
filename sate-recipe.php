<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tubes PW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        *{
    font-family: 'poppins', sans-serif;

}

body{
    background: #white;
}

.section-padding{
    padding: 100px 0;
}

.navbar-nav a{
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
}

.navbar-light .navbar-brand{
    color: #000;
    font-size: 25px;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 2px;
}

.navbar-light .navbar-brand:focus,
.navbar-light .navbar-brand:hover{
    color: #000;
}

.navbar-light .navbar-nav .nav-link{
    color: #000;
}

.w-100{
    height: 100vh;
}

.navbar-toggler {
	padding: 1px 5px;
	font-size: 18px;
	line-height: 0.3;
	background: #fff;
}

.container img{
    margin-top: 60px;
}

/*responsive CSS*/

@media only screen and (min-width: 768px) and (max-width: 991px){
    .card{
        margin-bottom: 30px;
    }
    .img-area img{
        width: 100%;
    }
}

@media only screen and (max-width: 767px){
    .navbar-nav{
        text-align: center;
    }
    .about-text{
        padding-top: 50px;
    }
    .card{
        margin-bottom: 30px;
    }

    @media only screen and (max-width: 768px){

        .box-area{
           margin: 0 10px;
    
        }
        .left-box{
           height: 100px;
           overflow: hidden;
        }
        .right-box{
           padding: 20px;
        }  
    }
}
    </style>

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

      <!--About section-->
      <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="img/sate2.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>Chicken Satay<br>Recipe</h2>
                        <p>
                        <?php
                            // Fungsi untuk mencetak resep sate
                            function cetakResepSate()
                            {
                                $bahan = [
                                    "500 gram daging ayam (dapat diganti dengan daging sapi, kambing, atau bahan lain sesuai selera), potong dadu",
                                    "Bamboo skewers (tusuk sate)",
                                    "2 sendok makan minyak goreng",
                                    "Garam secukupnya",
                                    "Lada hitam bubuk secukupnya"
                                ];

                                $bumbuMarinasi = [
                                    "4 siung bawang putih, haluskan",
                                    "2 sendok makan kecap manis",
                                    "1 sendok makan minyak wijen",
                                    "1 sendok teh gula merah, serut",
                                    "1/2 sendok teh ketumbar bubuk",
                                    "1/2 sendok teh jintan bubuk",
                                    "1/2 sendok teh bubuk kunyit",
                                    "Garam secukupnya"
                                ];

                                $bumbuSausKacang = [
                                    "100 gram kacang tanah, sangrai dan haluskan",
                                    "2 siung bawang putih, haluskan",
                                    "3 sendok makan kecap manis",
                                    "1 sendok makan air jeruk nipis",
                                    "1 sendok makan gula merah, serut",
                                    "1/2 sendok teh garam",
                                    "1/2 sendok teh cabai bubuk (opsional)",
                                    "Air secukupnya"
                                ];

                                $langkah = [
                                    "Campurkan bawang putih halus, kecap manis, minyak wijen, gula merah serut, ketumbar bubuk, jintan bubuk, bubuk kunyit, dan garam dalam wadah. Aduk rata.",
                                    "Masukkan potongan daging ayam ke dalam wadah dengan bumbu marinasi. Aduk hingga daging terbalut rata dengan bumbu. Diamkan dalam lemari es selama minimal 1 jam agar bumbu meresap.",
                                    "Tusukkan potongan daging ayam yang telah dimarinasi ke tusuk sate secara bergantian.",
                                    "Panaskan minyak goreng dalam wajan anti lengket. Panggang sate ayam di atas wajan dengan api sedang hingga matang dan berwarna kecokelatan. Bolak-balik sate agar matang merata.",
                                    "Untuk saus kacang, campurkan kacang tanah halus, bawang putih halus, kecap manis, air jeruk nipis, gula merah serut, garam, dan cabai bubuk (jika menggunakan) dalam wadah. Tambahkan air sedikit demi sedikit sambil diaduk hingga mendapatkan konsistensi yang diinginkan.",
                                    "Sajikan sate ayam dengan saus kacang."
                                ];

                                echo "Bahan-bahan:<br>";
                                foreach ($bahan as $item) {
                                    echo "- $item<br>";
                                }
                                echo "<br>";

                                echo "Bumbu marinasi:<br>";
                                foreach ($bumbuMarinasi as $item) {
                                    echo "- $item<br>";
                                }
                                echo "<br>";

                                echo "Bumbu saus kacang:<br>";
                                foreach ($bumbuSausKacang as $item) {
                                    echo "- $item<br>";
                                }
                                echo "<br>";

                                echo "Langkah-langkah:<br>";
                                foreach ($langkah as $index => $item) {
                                    echo ($index + 1) . ". $item<br>";
                                }
                            }

                            // Memanggil fungsi untuk mencetak resep sate
                            cetakResepSate();
                         ?>

                            

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