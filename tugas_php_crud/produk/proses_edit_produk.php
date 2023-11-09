<?php

$id = $_GET['id']; // Dapatkan ID dari parameter URL
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok']; // Perlu menambahkan stok
$satuan = $_POST['satuan'];
$supplier_id = $_POST['supplier_id'];

include "connection.php";

// Menggunakan parameterized query untuk mencegah SQL Injection
$query = "UPDATE produk SET nama_produk = ?, harga = ?, stok = ?, satuan = ?, supplier_id = ? WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssissi', $nama_produk, $harga, $stok, $satuan, $supplier_id, $id);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: produk.php");
    } else {
        echo "Gagal mengedit produk: " . mysqli_error($connection);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error in prepared statement: " . mysqli_error($connection);
}

mysqli_close($connection);

?>