<?php	


	// if save change happen
	if(!isset($_POST['edit'])){
		echo "Something is wrong!";
		exit;
}


    $category_id = trim($_POST['category_id']);
    //$product_id = mysqli_real_escape_string($conn, $product_id);

    $category_name = trim($_POST['category_name']);
    //$product_SKU = mysqli_real_escape_string($conn, $product_SKU);

    
	require_once "./database_config.php";
	$conn = db_connect();


	$query = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'"; 
	


	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: category_edit.php?category_id=$category_id");
	}
?>