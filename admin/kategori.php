<?php
require "functions.php";

$kategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $kategoriData = getKategoriData();

    $filteredData = array_filter($kategoriData, function ($data) use ($keyword) {
        return stripos($data['nama'], $keyword) !== false;
    });

    if (count($filteredData) > 0) {
        $jumlah = 1;
        foreach ($filteredData as $data) {
            echo '<tr>
                    <td>' . $jumlah++ . '</td>
                    <td>' . $data['nama'] . '</td>
                    <td class="no-print">
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal' . $data['id'] . '">Edit</button>
                        <a href="?delete=' . $data['id'] . '" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>';
        }
    } else {
        echo '<tr><td colspan="3">Tidak ada hasil yang ditemukan.</td></tr>';
    }
} else {
    // Tampilkan semua data kategori
    $jumlah = 1;
    foreach ($kategoriData as $data) {
        echo '<tr>
                <td>' . $jumlah++ . '</td>
                <td>' . $data['nama'] . '</td>
                <td class="no-print">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal' . $data['id'] . '">Edit</button>
                    <a href="?delete=' . $data['id'] . '" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>';
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

</head>
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

<body>

    <?php require "partials/nav.php" ?>


    <div class="container mt-4">

        <div class="no-print">
            <h2 class="" style="margin-top: 100px;">Food List Kategori</h2>
            <form action="" method="get" class="mb-1 mt-2">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari kategori...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Tambah
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" onclick="window.print()">
                Print PDF
            </button>
        </div>
        <!-- Button trigger modal -->


        <!-- Table -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th class="no-print">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_GET['search'])) {
                    $keyword = $_GET['search'];
                    $kategoriData = getKategoriData();

                    $filteredData = array_filter($kategoriData, function ($data) use ($keyword) {
                        return stripos($data['nama'], $keyword) !== false;
                    });

                    if (count($filteredData) > 0) {
                        $jumlah = 1;
                        foreach ($filteredData as $data) {
                            echo '<tr>
                    <td>' . $jumlah++ . '</td>
                    <td>' . $data['nama'] . '</td>
                    <td class="no-print">
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal' . $data['id'] . '">Edit</button>
                        <a href="?delete=' . $data['id'] . '" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">Tidak ada hasil yang ditemukan.</td></tr>';
                    }
                } else {
                    // Tampilkan semua data kategori
                    $jumlah = 1;
                    foreach ($kategoriData as $data) {
                        echo '<tr>
                <td>' . $jumlah++ . '</td>
                <td>' . $data['nama'] . '</td>
                <td class="no-print">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal' . $data['id'] . '">Edit</button>
                    <a href="?delete=' . $data['id'] . '" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>';
                    }
                } ?>
            </tbody>
        </table>
    </div>


    <!-- Tambah -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form inputs here -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->
    <?php foreach ($kategoriData as $data) : ?>

        <div class="modal fade" id="editModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="form-group">
                                <label for="edit-name">Nama Kategori</label>
                                <input type="text" class="form-control" id="edit-name" name="nama" value="<?= $data['nama']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="update">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!--Footer-->
    <?php require "partials/footer.php" ?>



    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>