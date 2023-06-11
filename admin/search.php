<?php
require "functions.php";

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
