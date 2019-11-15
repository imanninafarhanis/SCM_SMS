<?php
	$catid = $_GET['category_id'];

	require_once "./database_config.php";
	$conn = db_connect();

	$query = "DELETE FROM category WHERE category_id = '$catid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: category.php");
?>