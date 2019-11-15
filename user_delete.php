<?php
	$username = $_GET['username'];

	require_once "./database_config.php";
	$conn = db_connect();

	$query = "DELETE FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: user_info.php");
?>