<?php
require "functions.php";

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori
    b ON a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Script Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->

    <!-- Navbar -->

    <div class="container mt-5">
        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="text-decoration-none text-muted"><i class="fa fa-chevron-left"></i> Back</a>
                </li>

            </ol>
        </nav>
        <!-- breadcrumb -->

        <!-- tambah produk -->
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Produk</h3>

            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                        while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="bahan">Bahan-bahan</label>
                    <textarea name="bahan" id="bahan" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label for="langkah">Langkah-langkah</label>
                    <textarea name="langkah" id="langkah" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $nama     = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $bahan    = htmlspecialchars($_POST['bahan']);
                $langkah  = htmlspecialchars($_POST['langkah']);

                $target_dir = "../img/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES['foto']['size'];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '' || $bahan == '' || $langkah == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, Kategori dan Harga wajib di isi
                    </div>

                    <?php
                } else {
                    if ($nama_file != '') {
                        if ($image_size > 500000) {
                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 500kb
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Format File harus jpg, png, atau gif
                                </div>
                        <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir.$new_name);
                            }
                        }
                    }

                    // query insert to produk table
                    $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, foto, bahan, langkah) 
                    VALUES ('$kategori', '$nama', '$new_name', '$bahan', '$langkah')");

var_dump($_FILES["foto"]["tmp_name"]);
                    if ($queryTambah) {
                        ?>
                        <script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Produk Berhasil di Tambahkan',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        </script>

                        <meta http-equiv="refresh" content="2; url=index.php" />
            <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
            ?>
        </div>



    </div>

    <!-- Footer -->
    <?php require "partials/footer.php" ?>
    <!-- Akhir Footer -->

    <!-- Script -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>