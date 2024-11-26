
<?php

include "connect.php";

if(isset($_POST['signUp'])){
    $Firstname = $_POST['FirstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    $checkEmail="SELECT * From students where email='$email'";
    $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }else{
        $insertquery="insert into students(FirstName, email, password, number)values('$Firstname','$email','$password','$number')";
        if($conn->query($insertquery)==TRUE){
            echo"registration Done"; 
        }else{
            echo"Error:".$conn->error;
        }
    }
}

if(isset($_POST['options'])){
    if($_POST['options']=='S'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM students WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
     session_start();
     $row=$result->fetch_assoc();
     $_SESSION['email']=$row['email'];
     header("Location: Students.php");
     exit();
    }
    else{
     echo "Not Found, Incorrect Email or Password";
    }
    }
    if($_POST['options']=='D'){
        $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM drivers WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
     session_start();
     $row=$result->fetch_assoc();
     $_SESSION['email']=$row['email'];
     header("Location: driver_page.php");
     exit();
    }
    else{
     echo "Not Found, Incorrect Email or Password";
    }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="background">
<div class="form-container">
<form action="front.html" method="post">
    <button type="submit" class="btn" >Login</button>
</form>
</div>
</div>
</body>
</html>