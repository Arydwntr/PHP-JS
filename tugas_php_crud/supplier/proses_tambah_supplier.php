<?php
	
	$nama = $_POST['nama'];
	$telpon = $_POST['telpon'];
	$alamat = $_POST['alamat'];

	include "connection.php";

	mysqli_query($connection,
		"INSERT INTO `supplier` (`nama`, `telpon`, `alamat`) 
		VALUES ('$nama', '$telpon', '$alamat'); ");

	header("Location:supplier.php");

?>