 <?php
  session_start();
  $count = 0;  
  $title = "Add Category";
  include('./assets/template/header_product.php');
  include('./assets/template/navbar.php');
  require_once "./database_config.php";
  $conn = db_connect();

  //add product

  if(isset($_POST['add'])){

    $product_id = trim($_POST['product_id']);
    $product_id = mysqli_real_escape_string($conn, $product_id);

    $category_id = trim($_POST['category_id']);
    $category_id = mysqli_real_escape_string($conn, $category_id);

    $product_SKU = trim($_POST['product_SKU']);
    $product_SKU = mysqli_real_escape_string($conn, $product_SKU);

    $product_name = trim($_POST['product_name']);
    $product_name = mysqli_real_escape_string($conn, $product_name);

    $product_description = trim($_POST['product_description']);
    $product_description = mysqli_real_escape_string($conn, $product_description);

    $product_price = trim($_POST['product_price']);
    $product_price = mysqli_real_escape_string($conn, $product_price);

    $product_colour = trim($_POST['product_colour']);
    $product_colour = mysqli_real_escape_string($conn, $product_colour);

    $product_size = trim($_POST['product_size']);
    $product_size = mysqli_real_escape_string($conn, $product_size);

    $product_quantity = trim($_POST['product_quantity']);
    $product_quantity = mysqli_real_escape_string($conn, $product_quantity);

  



    // add image
    if(isset($_FILES['product_img']) && $_FILES['product_img']['name'] != ""){
      $product_img = $_FILES['product_img']['name'];
      $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
      $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "images/items";
      $uploadDirectory .= $product_img;
      move_uploaded_file($_FILES['product_img']['tmp_name'], $uploadDirectory);
    }

    $query = "INSERT INTO product VALUES 
    ('".$product_id."', '".$category_id."', '" . $product_SKU . "', '" . $product_name . "', '" . $product_description . "', 
    '" . $product_price . "', '" . $product_colour . "', '" . $product_size . "', 
    '" . $product_quantity . "', '" . $product_img . "')";
    $result = mysqli_query($conn, $query);
    if(!$result){
      echo "Insert products failed " . mysqli_error($conn);
      exit;
    }




    }
  
?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

          

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Imannina Farhanis</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="user_info.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Product</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add new product</h6>
            </div>
            <div class="card-body">

              <form method="post" action="product_add.php" enctype="multipart/form-data">
    <table class="table">
      <tr>
        <th>Product ID</th>
        <td><input type="text" name="product_id"></td>
      </tr>
      <tr>
        <th>Category ID</th>
        <td><input type="text" name="category_id"></td>
      </tr>
       <tr>
        <th>SKU No.</th>
        <td><input type="text" name="product_SKU" required/></td>
      </tr>
      <tr>
        <th>Name</th>
        <td><input type="text" name="product_name" required/></td>
      </tr>
       <tr>
        <th>Description</th>
        <td><textarea name="product_description" cols="40" rows="3"></textarea></td>
      </tr>
      <tr>
        <th>Price</th>
        <td><input type="text" name="product_price" required/></td>
      </tr>
      <tr>
        <th>Colour</th>
        <td><input type="text" name="product_colour" required/></td>
      </tr>
      <tr>
        <th>Size</th>
        <td><input type="text" name="product_size" required/></td>
      </tr>
       <tr>
        <th>Quantity</th>
        <td><input type="text" name="product_quantity" required/></td>
      </tr>
      <tr>
        <th>Image</th>
        <td><input type="file" name="product_img"></td>
      </tr>
      
      <tr>
    </table>
    <input type="submit" name="add" value="Add new product" class="btn btn-primary">
    <input type="reset" value="Cancel" class="btn btn-default">
   
  </form>
              
               
              </div>
            </div>
          </div>
          

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RIMS 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <?php
  if(isset($conn)) {mysqli_close($conn);}
  include('./assets/template/script.php');
  include('./assets/template/footer.php');

?>