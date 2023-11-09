<?php
	
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$telpon = $_POST['telpon'];
	$alamat = $_POST['alamat'];

	include "connection.php";

	mysqli_query($connection,
		"INSERT INTO `pelanggan` (`nama`, `jenis_kelamin`, `telpon`, `alamat`) 
		VALUES ('$nama', '$jenis_kelamin', '$telpon', '$alamat'); ");

	header("Location:index.php");

?>