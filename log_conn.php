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
            $_SESSION['id_user'] = $data['User_ID'];   
            phpAlert("Welcome bubu");

            redirect("home.php");
        }
        else{
            $msg = "Incorrect Username/Password";
            $css_class = "alert-danger";        
            $_SESSION['msg'] = $msg;
            $_SESSION['css'] = $css_class;    
            //phpAlert("Incorrect Username/Password");
            redirect("login.php");
        }

?>