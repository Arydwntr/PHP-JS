<?php
include "connection.php";
$query = mysqli_query($connection, "SELECT * FROM produk ORDER BY nama_produk DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
 	<style>
        .navbar {
            background-color: #000000;
            color: #fff;
        }
        .navbar a {
            color: #FF4500;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand p-3 fs-4" href="#">CRUD</a>
            <div class="collapse navbar-collapse" id="navbar-nav">
                <ul class="navbar-nav ms-auto p-3 me-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php" style="color: #FFFAF0;">
                            PELANGGAN
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../supplier/supplier.php" style="color: #FFFAF0;">
                            SUPPLIER
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="produk.php" style="color: #FFFAF0;">
                            PRODUK
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h1 class="text-center">Data Produk</h1>
        <a href="tambah_produk.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data</a>
        <table class="table table-hover" id="myTable">
            <thead>
                <tr class="text-center align-middle">
                    <th class="text-center" scope="col"> Nama </th>
                    <th class="text-center" scope="col"> Harga </th>
                    <th class="text-center" scope="col"> Stok </th>
                    <th class="text-center" scope="col"> Satuan </th>
                    <th class="text-center" scope="col"> Supplier Id </th>
                    <th class="text-center" scope="col"> Aksi </th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($query) > 0) { ?>
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td class="text-center align-middle"><?= $data['nama_produk'] ?></td>
                            <td class="text-center align-middle"><?= $data['harga'] ?></td>
                            <td class="text-center align-middle"><?= $data['stok'] ?></td>
                            <td class="text-center align-middle"><?= $data['satuan'] ?></td>
                            <td class="text-center align-middle"><?= $data['supplier_id'] ?></td>
                            <td width="200px" class="text-center align-middle">
                                <a href="edit_produk.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm text-white">Edit<i class="bi bi-pencil-square"></i></a>
                                <a href="delete_produk.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Hapus<i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data produk.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>