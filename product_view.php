<?php
  session_start();
 
  // connect to database
  include('./assets/template/header_product.php');
  include('./assets/template/navbar.php');
  require_once "./database_config.php";
  $conn = db_connect();

$prodid = $_GET['product_id'];


  $query = "SELECT * FROM product WHERE product_id = '$prodid'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }


  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
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
              <h6 class="m-0 font-weight-bold text-primary"><p class="lead" style="margin: 25px 0"><a href="product.php">Product</a> > <?php echo $row['product_name']; ?></p></h6>
            </div>
            <div class="card-body">

      <!-- Example row of columns -->
      
      <div class="row" style="margin-top:50px; margin-left: 150px;">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" style="margin-top: 50px; width: 500px; height: 300px;"src="images/items<?php echo $row['product_img']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Description</h4>
          <p><?php echo $row['product_description']; ?></p>
        </br>
          <h4>Product Details</h4>
          <table class="table">
            <?php foreach($row as $key => $value){
              if($key == "product_description" || $key == "product_img" || $key == "product_name"){
                continue;
              }
              switch($key){
                case "product_id":
                  $key = " Product ID";
                  break;
                   case "category_id":
                  $key = "Category ID";
                  break;
                case "product_SKU":
                  $key = "SKU No.";
                  break;
                case "product_name":
                  $key = "Name";
                  break;
                case "product_description":
                  $key = "Description";
                  break;
                case "product_price":
                  $key = "Price";
                  break;
                case "product_colour":
                  $key = "Colour";
                  break;
                   case "product_size":
                  $key = "Size";
                  break;
                   case "product_quantity":
                  $key = "Quantity";
                  break;
              }
            ?>

            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>

          </table>



            <input type="submit" name="transfer" value="Transfer product" class="btn btn-primary">
            <div id="userModal" class="modal fade">
         <div class="modal-dialog">
          <form method="post" id="user_form">
           <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
           </div>
           <div class="modal-body">
            <div class="form-group">
       <label>Enter User Name</label>
       <input type="text" name="user_name" id="user_name" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter User Email</label>
       <input type="email" name="user_email" id="user_email" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter User Password</label>
       <input type="password" name="user_password" id="user_password" class="form-control" required />
      </div>
           </div>
           <div class="modal-footer">
            <input type="hidden" name="user_id" id="user_id" />
            <input type="hidden" name="btn_action" id="btn_action" />
            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
          </div>
          </form>

         </div>
        </div>

 
               
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
include('./assets/template/script_tables.php');
include('./assets/template/footer.php');

  ?>