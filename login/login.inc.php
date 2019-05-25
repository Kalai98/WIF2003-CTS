<?php


if(isset($_POST['submit'])){
    require('../config/db.php');

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Empty fields
    if(empty($login) || empty($password)){
        header('Location: '.ROOT_URL.'login/index.php?error=emptyFields');
        exit();
    }
    
    // Input recieved
    else{
        $query = "SELECT * FROM users WHERE Username = '$login' OR Email = '$login'";

        $result = mysqli_query($conn, $query);

        // If user exist
        if($row = mysqli_fetch_assoc($result)){

            // Check password
            if($password == $row['Password']){
                // Logged in
                session_start();
                $_SESSION['MatricNo'] = $row['Matric_No'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Email'] = $row['Email'];

                header('Location: '.ROOT_URL.'../cts-project/questions/index.php?login=success');
                exit();
            }
            
            // Wrong password
            else{
                header('Location: '.ROOT_URL.'login/index.php?error=wrongPassword');
                exit();
            }
        }
        else{
            header('Location: '.ROOT_URL.'login/index.php?error=notRegistered');
            exit(); 
        }
    }

}
else{
    header('Location: '.ROOT_URL.'login/');
    exit();
}