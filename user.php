<?php
	if(!isset($_SESSION['user']) && $_SESSION['user'] != true){
		header("Location: dashboard.php");
	}
?>