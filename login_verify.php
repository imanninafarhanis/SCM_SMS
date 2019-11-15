<?php
    session_start();

   

    if (isset($_POST["username"]) && isset($_POST["password"])) {

        $username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
        $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters


        // Connect to the MySQL database  
        include "database_config.php";
        $conn = db_connect();
        $query = "SELECT username, name FROM user WHERE username ='$username' AND password ='$password' LIMIT 1"; // query the person

        // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result); // count the row nums
        if ($count == 1) { // evaluate the count
            while($row = mysqli_fetch_array($result)){
                 $username = $row["username"];
            }
           
        
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header("location: dashboard.php");
            exit();
        } else {
            echo 'That information is incorrect, try again <a href="login.php">Click Here</a>';
            exit();
        }
    }
?>
