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
                        <img src="img/sandwich2.jpeg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>Sandwich<br>Recipe</h2>
                        <p>
                        <?php
// Fungsi untuk mencetak resep sandwich
function cetakResepSandwich()
{
    $bahan = [
        "Roti tawar",
        "Daging panggang (daging ayam, daging sapi, atau daging babi)",
        "Keju",
        "Selada",
        "Tomat",
        "Bawang bombay",
        "Mayones",
        "Mustard",
        "Garam",
        "Lada",
        "Minyak zaitun"
    ];

    $langkah = [
        "Panggang daging hingga matang dan empuk. Potong tipis-tipis.",
        "Iris tomat, selada, dan bawang bombay tipis-tipis.",
        "Ambil dua lembar roti tawar.",
        "Olesi satu sisi roti dengan mayones dan sisi lainnya dengan mustard.",
        "Letakkan potongan daging panggang di atas mayones.",
        "Tambahkan irisan tomat, selada, dan bawang bombay di atas daging.",
        "Letakkan irisan keju di atas sayuran.",
        "Taburi dengan sedikit garam dan lada.",
        "Tutup sandwich dengan lembar roti tawar yang satunya.",
        "Panaskan sedikit minyak zaitun di atas wajan.",
        "Panggang sandwich di wajan dengan api sedang hingga kedua sisinya berwarna kecokelatan dan keju meleleh.",
        "Angkat sandwich dari wajan dan potong menjadi dua atau empat bagian.",
        "Sandwich siap disajikan."
    ];

    echo "Bahan-bahan:<br>";
    foreach ($bahan as $item) {
        echo "- $item<br>";
    }
    echo "<br>";

    echo "Langkah-langkah:<br>";
    foreach ($langkah as $index => $item) {
        echo ($index + 1) . ". $item<br>";
    }
}

// Memanggil fungsi untuk mencetak resep sandwich
cetakResepSandwich();
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