<?php
// require "session.php";
require "functions.php";

$id = $_GET['p'];

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

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
    <title>Produk Detail</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Script Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require "partials/nav.php"; ?>
    <!-- Navbar -->

    <!-- Container -->
    <div class="container mt-5">


        <div class="my-5 col-12 col-md-6 mb-5">
            <h2>Detail Produk</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>

                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="currentFoto">Foto Produk Sekarang</label>
                    <img src="image/<?php echo $data['foto']; ?>" alt="" width="200px">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="bahan">Bahan-bahan</label>
                    <textarea name="bahan" id="bahan" cols="30" rows="10" class="form-control">
                        <?php echo stripcslashes($data['bahan']); ?>
                    </textarea>
                </div>
                <div>
                    <label for="langkah">langkah-langkah</label>
                    <textarea name="langkah" id="langkah" cols="30" rows="10" class="form-control">
                        <?php echo $data['langkah']; ?>
                    </textarea>
                </div>
                <div CLASS="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger mt-2" name="hapus">Hapus</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $bahan = htmlspecialchars($_POST['bahan']);
                $langkah = htmlspecialchars($_POST['langkah']);

                $target_dir = "../img/";
                $nama_file = '';
                if (isset($_FILES["foto"]["name"])) {
                    $nama_file = basename($_FILES["foto"]["name"]);
                }
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = '';
                if (isset($_FILES['foto']['name']) && $_FILES['foto']['size'] > 500000) {
                }
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '' || $bahan == '' || $langkah == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, Kategori, Bahan dan Langkah wajib di isi
                    </div>
                    <?php
                } else {
                    $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', bahan='$bahan', langkah='$langkah' WHERE id=$id");

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
                                <script>
                                    Swal.fire({
                                        title: '<h3>Format File harus jpg, png, atau gif</h3>',
                                        showClass: {
                                            popup: 'animate__animated animate__fadeInDown'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__fadeOutUp'
                                        }
                                    })
                                </script>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . '/' . $new_name);
                                $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");

                                if ($queryUpdate) {
                                ?>
                                    <script>
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Produk Berhasil di Ubah',
                                            showConfirmButton: false,
                                            timer: 2000
                                        })
                                    </script>

                                    <meta http-equiv="refresh" content="2; url=produk.php" />
                    <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Produk Berhasil di Ubah',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    </script>
                <?php
                }
            }

            if (isset($_POST['hapus'])) {
                $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

                if ($queryHapus) {
                ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Produk Berhasil di Hapus',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    </script>

                    <meta http-equiv="refresh" content="2; url=index.php" />
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- Container -->

    <!-- Footer -->
    <?php require "partials/footer.php" ?>
    <!-- Footer -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>s