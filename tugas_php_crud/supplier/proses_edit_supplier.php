<?php

$id = $_GET['id'];
$nama = $_POST['nama'];
$telpon = $_POST['telpon'];
$alamat = $_POST['alamat'];

include "connection.php";

mysqli_query($connection, "UPDATE supplier SET nama = '$nama', telpon = '$telpon', alamat = '$alamat' WHERE id = '$id' ");

header("Location:supplier.php");

?>