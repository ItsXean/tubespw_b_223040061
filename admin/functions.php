<?php
$con = mysqli_connect("localhost", "root", "", "db_litrecipe");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function koneksi()
{
    $host = "localhost"; // Replace with your actual database host
    $username = "root"; // Replace with your actual database username
    $password = ""; // Replace with your actual database password
    $database = "db_litrecipe"; // Replace with your actual database name

    // Create a connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function getKategoriData()
{
    global $con;
    $query = "SELECT * FROM kategori";
    $result = mysqli_query($con, $query);
    $kategoriData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $kategoriData;
}


// Fungsi untuk menghapus data galeri dari database
function deleteKategoriData($id)
{
    global $con;

    $query = "DELETE FROM kategori WHERE id='$id'";
    mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if (mysqli_affected_rows($con) > 0) {
        header('Location: kategori.php?delete_success=true');
        exit();
    }
}
// Proses hapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteKategoriData($id);
    header('Location: kategori.php');
    exit();
}
if (isset($_GET['delete_success'])) {
    echo '<script>alert("Kategori berhasil dihapus!");</script>';
}
// 


// Fungsi untuk menambah data galeri ke database
function addKategoriData($nama)
{
    global $con;

    // Query untuk menambahkan data ke tabel kategori
    $query = "INSERT INTO kategori (nama) VALUES ('$nama')";
    mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if (mysqli_affected_rows($con) > 0) {
        header('Location: kategori.php?add_success=true');
        exit();
    }
}

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    addKategoriData($nama);
    header('Location: kategori.php');
    exit();
}
// 


// Fungsi untuk mengedit data kategori pada database
function editKategoriData($id, $nama)
{
    global $con;

    // Query untuk mengupdate data kategori
    $query = "UPDATE kategori SET nama='$nama' WHERE id='$id'";
    mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if (mysqli_affected_rows($con) > 0) {
        // Redirect ke halaman kategori.php dengan parameter edit_success
        header('Location: kategori.php?edit_success=true');
        exit();
    }
}

if (isset($_GET['edit_success'])) {
    echo '<script>alert("Kategori berhasil diubah!");</script>';
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    editKategoriData($id, $nama);
    header('Location: kategori.php');


    exit();
}
//

$kategoriData = getKategoriData();
///////////////
