<?php
    include_once "dbconnect.php";
    error_reporting (E_ALL ^ E_NOTICE);
    ob_start();

    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $query = "SELECT * from users where Email = '$email' AND Password = '$pwd' ";

    $result = mysqli_query($conn,$query);


        if(mysqli_num_rows($result) == 1){

            $data = mysqli_fetch_assoc($result);

            //phpAlert($get_name);
            
            phpAlert("Logged In!");

            redirect("home.php");
        }
        else{
            phpAlert("Incorrect Username/Password");
            redirect("login.php");
        }

?>