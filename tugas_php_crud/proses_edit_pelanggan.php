<?php

$id = $_GET['id'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telpon = $_POST['telpon'];
$alamat = $_POST['alamat'];

include "connection.php";

mysqli_query($connection, "UPDATE pelanggan SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', telpon = '$telpon', alamat = '$alamat' WHERE id = '$id' ");

header("Location:index.php");

?>