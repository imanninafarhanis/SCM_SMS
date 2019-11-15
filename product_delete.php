<?php
	$prodid = $_GET['product_id'];

	require_once "./database_config.php";
	$conn = db_connect();

	$query = "DELETE FROM product WHERE product_id = '$prodid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: product.php");
?>