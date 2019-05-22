<?php

if (isset($_POST['submit'])){
    require('../config/config.php');
    // session_start();
    $matricNo = mysqli_real_escape_string($conn,$_POST['matricNo']); 
    $yearStudy =mysqli_real_escape_string($conn,$_POST['yearStudy']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $age = mysqli_real_escape_string($conn,$_POST['age']);
    $ethnicGroup = mysqli_real_escape_string($conn,$_POST['ethnicGroup']);
    $nationality =mysqli_real_escape_string($conn,$_POST['nationality']);
    $username =mysqli_real_escape_string($conn,$_POST['username']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
    $confirmPassword =mysqli_real_escape_string($conn,$_POST['confirmPassword']);

    // if (empty($matricNo) || empty($yearStudy) ||empty($gender) ||empty($age) ||empty($ethnicGroup) ||empty($nationality) ||empty($username) ||empty($password) ||empty($confirmPassword)){
    //   header("Location: /index.html?error=emptyfields&username=".$username."&email=.$);
    // }

    //password not match
    if($password !== $confirmPassword){
        header("location: index.html?error=passwordcheckusername=".$username);
        exit();
    }
    //password match
    else{
      $sql = "INSERT INTO signin (matricNo,yearStudy,gender,age,ethnicGroup,nationality,username,password,confirmPassword) VALUES ('$matricNo','$yearStudy','$gender','$age','$ethnicGroup','$nationality','$username','$password','$confirmPassword')";
      //INSERT INTO DB
      //mysqli_query($conn,$sql);
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare ($stmt,$sql)){
        header("Location: index.html?error=sqlerror");
        exit();
      }
      
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Thank you!</title>
  </head>
  <body>
      
      <div class="container">
        <h1>Thank you for register!</h1>
        <a href="../login.html" class="btn btn-primary">Login</a>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

