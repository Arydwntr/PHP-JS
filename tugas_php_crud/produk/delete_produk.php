<?php

	include "connection.php";

	$id = $_GET['id'];

	mysqli_query($connection, "DELETE FROM produk WHERE id='$id' ");

	header("location:produk.php");

?>