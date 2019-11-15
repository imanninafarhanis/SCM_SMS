<?php
  $title = "Login Page";
  require_once "./assets/template/header_auth.php";
  //include database
  include('database_config.php');
  
?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="login_verify.php" method="post">
                
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Enter Staff ID..." required/>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password"  placeholder="Password" required/>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php
  //include('./assets/template/script.php');
  require_once "./assets/template/script.php";
  require_once "./assets/template/footer.php";
?>