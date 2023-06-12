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

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
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

        <meta http-equiv="refresh" content="1; url=index.php" />
<?php
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LITRECIPE | ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,800;0,900;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Script Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require "partials/nav.php" ?>
    <!-- Navbar -->

    <div class="container mt-5">

        <!-- Container -->
        <div class="mt-5">
            <h2 style="margin-top: 100px;">List Produk</h2>
            <div>
                <!-- Ubah form pencarian -->
                <form class="d-flex ms-auto my-4" id="form-cari" method="GET">
                    <input class="form-control me-2" type="text" placeholder="Cari Barang Anda" aria-label="Search" name="keyword" id="keyword" />
                    <button class="btn btn-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>



                <button type="submit" class="btn btn-primary mb-2" name="" onclick="location.href='tambah-produk.php'">Tambah</button>
                <button type="button" class="btn btn-danger mb-2" data-toggle="modal" onclick="window.print()">
                    Print PDF
                </button>
            </div>

            <div class=" table mt-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Action.</th>
                        </tr>
                    </thead>
                    <tbody id="tabel-produk">
                        <?php
                        if ($jumlahProduk == 0) {
                        ?>
                            <tr>
                                <td colspan=6 class="text-center">Data produk tidak tersedia</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td> <?php echo $jumlah; ?></td>
                                    <td>
                                        <img src="../img/<?php echo $data['foto']; ?>" style="width: 70px;">
                                    </td>
                                    <td> <?php echo $data['nama']; ?></td>
                                    <td> <?php echo $data['nama_kategori']; ?></td>
                                    <td>
                                        <a href="produk-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="index.php?hapus=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                        <?php
                                $jumlah++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container -->

    <!-- Footer -->
    <?php require "partials/footer.php" ?>
    <!-- Akhir Footer -->

    <!-- Script -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Tambahkan kode JavaScript -->
    <script>
        // Fungsi untuk mengirim permintaan pencarian menggunakan Ajax
        function cariProduk(keyword) {
            // Mengirim permintaan pencarian ke server
            $.ajax({
                url: "cari-produk.php",
                method: "GET",
                data: {
                    keyword: keyword
                },
                success: function(response) {
                    // Menampilkan hasil pencarian ke dalam tabel
                    $("#tabel-produk").html(response);
                }
            });
        }

        // Menggunakan event submit pada form pencarian
        $("#form-cari").submit(function(event) {
            event.preventDefault(); // Menghentikan aksi default form submit
            var keyword = $("#keyword").val(); // Mendapatkan nilai keyword dari input
            cariProduk(keyword); // Memanggil fungsi pencarian
        });
    </script>


    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>