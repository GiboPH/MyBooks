<?php
require_once "dbconnect.php";

$fname = $_POST['FirstName'];
$lname =$_POST['LastName'];
$pwd = $_POST['password'];
$email = $_POST['email'];

$query = "SELECT * from users where Email = '$email'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1){
    phpAlert("The Username is already Taken.");
}
else{
    $input = "INSERT INTO users (First_Name, Last_Name, Email, Password) VALUES ('$fname','$lname','$email','$pwd')";
    
    if (mysqli_query($conn, $input)) {
        phpAlert("Account Created Successfuly!");
        //redirect("login.php");
        exit();
      } else {
        phpAlert("Error: Please Try Again");
        //redirect("login.php");
        exit();
      }
}
?>