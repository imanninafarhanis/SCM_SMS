<?php	


	// if save change happen
	if(!isset($_POST['edit'])){
		echo "Something is wrong!";
		exit;
}


    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);

    
	require_once "./database_config.php";
	$conn = db_connect();


	$query = "UPDATE user SET email = '$email', phone_number = '$phone_number' WHERE username = '$username'"; 
	


	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: user_edit.php?username=$username");
	}
?>