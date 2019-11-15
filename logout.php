<?php

session_start();

session_destroy();
//hello world
header("location:login.php");	
?>