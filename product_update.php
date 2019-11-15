<?php	


	// if save change happen
	if(!isset($_POST['edit'])){
		echo "Something is wrong!";
		exit;
	
}


    $product_id = trim($_POST['product_id']);
    //$product_id = mysqli_real_escape_string($conn, $product_id);

    $category_id = trim($_POST['category_id']);
    //$product_id = mysqli_real_escape_string($conn, $product_id);

    $product_SKU = trim($_POST['product_SKU']);
    //$product_SKU = mysqli_real_escape_string($conn, $product_SKU);

    $product_name = trim($_POST['product_name']);
    //$product_name = mysqli_real_escape_string($conn, $product_name);

    $product_description = trim($_POST['product_description']);
    //$product_description = mysqli_real_escape_string($conn, $product_description);

    $product_price = trim($_POST['product_price']);
    //$product_price = mysqli_real_escape_string($conn, $product_price);

    $product_colour = trim($_POST['product_colour']);
    //$product_colour = mysqli_real_escape_string($conn, $product_colour);

    $product_size = trim($_POST['product_size']);
    //$product_size = mysqli_real_escape_string($conn, $product_size);

    $product_quantity = trim($_POST['product_quantity']);
    //$product_quantity = mysqli_real_escape_string($conn, $product_quantity);

	if(isset($_FILES['product_img']) && $_FILES['product_img']['name'] != ""){
      $product_img = $_FILES['product_img']['name'];
      $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
      $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "images/items";
      $uploadDirectory .= $product_img;
      move_uploaded_file($_FILES['product_img']['tmp_name'], $uploadDirectory);
    }



	require_once "./database_config.php";
	$conn = db_connect();


	$query = "UPDATE product SET 
	product_SKU = '$product_SKU', 
	product_name = '$product_name',
	product_description = '$product_description', 
	product_price = '$product_price', 
	product_colour = '$product_colour', 
	product_size = '$product_size',  
	product_quantity = '$product_quantity'";


	if(isset($product_img)){
		$query .= ", product_img ='$product_img' WHERE product_id = '$product_id'";
	} else {
		$query .= " WHERE product_id = '$product_id'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: product_edit.php?product_id=$product_id");
	}
?>