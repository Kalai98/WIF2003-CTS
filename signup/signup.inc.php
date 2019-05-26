<?php
require('../config/db.php');

if (isset($_POST['submit'])) {

  $matricNo = mysqli_real_escape_string($conn, $_POST['matricNo']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
  $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
  $yearStudy = mysqli_real_escape_string($conn, $_POST['yearStudy']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $ethnic = mysqli_real_escape_string($conn, $_POST['ethnicGroup']);
  $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
  

  $sqlMatric = "SELECT Matric_No FROM users WHERE Matric_No = '$matricNo'";
  $sqlUsername = "SELECT Username FROM users WHERE Username = '$username'";
  $sqlEmail = "SELECT Email FROM users WHERE Email = '$email'";

  // Matric number taken
  if(mysqli_num_rows(mysqli_query($conn, $sqlMatric))){
    header('Location: '.ROOT_URL.'signup/index.php?error=matricNoTaken');
    exit();
  }
  
  // Username taken
  if(mysqli_num_rows(mysqli_query($conn, $sqlUsername))){
    header('Location: '.ROOT_URL.'signup/index.php?error=usernameTaken');
    exit();
  }

  // Email taken
  if(mysqli_num_rows(mysqli_query($conn, $sqlEmail))){
    header('Location: '.ROOT_URL.'signup/index.php?error=emailTaken');
    exit();
  }

  //password not match
  if ($password !== $confirmPassword) {
    header('Location: '.ROOT_URL.'signup/index.php?error=passwordnotmatch');
    exit();
  }

  //All fine
  else {
    $query = "INSERT INTO `users`(`Matric_No`, `Username`, `Name`, `Email`, `Password`, `CGPA`, `Year_Of_Study`, `Gender`, `Age Group`, `Ethnic`, `Nationality`) VALUES ('$matricNo','$username','$name','$email','$password','$cgpa','$yearStudy','$gender','$age', '$ethnic', '$nationality')";
    
    //INSERT INTO DB
    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'login/index.php?register=success');
    }else{
        echo 'ERROR'. mysqli_error($conn);
    }

  }
}
?>