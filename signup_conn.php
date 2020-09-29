<?php
require_once "dbconnect.php";

$fname = $_POST['FirstName'];
$lname =$_POST['LastName'];
$pwd = $_POST['password'];
$email = $_POST['email'];
$pwdc = $_POST['password-c'];


$query = "SELECT * from users where Email = '$email'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1){
    $msg = "The Username is already Taken.";
    $css_class = "alert-danger";
    $_SESSION['msg'] = $msg;
    $_SESSION['css'] = $css_class;
   // phpAlert("The Username is already Taken.");
    redirect("registered.php");
    exit();
}
else if($pwd != $pwdc){
    $msg = "The confirmation password does not match";
    $css_class = "alert-danger";
    $_SESSION['msg'] = $msg;
    $_SESSION['css'] = $css_class;

    //phpAlert("The confirmation password does not match");
    redirect("registered.php");
    exit();
}
else{
    $input = "INSERT INTO users (First_Name, Last_Name, Email, Password) VALUES ('$fname','$lname','$email','$pwd')";
    
    if (mysqli_query($conn, $input)) {
        $msg = "Account Created Successfuly! Kindly login now.";
        $css_class = "alert-success";
        $_SESSION['msg'] = $msg;
        $_SESSION['css'] = $css_class;
        //phpAlert("Account Created Successfuly!");
        redirect("login.php");
        exit();
      } else {
        $msg = "Error: Failed to create account";
        $css_class = "alert-danger";        
        $_SESSION['msg'] = $msg;
        $_SESSION['css'] = $css_class;        
        //phpAlert("Error: Please Try Again");
        redirect("login.php");
        exit();
      }
}
?>