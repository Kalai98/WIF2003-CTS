<?php 

require('../config/db.php');
session_start();

echo $_POST['submit'];

// Check for submit
if(isset($_POST['submit'])){ 

    $a1 = mysqli_real_escape_string($conn, $_POST['a1']);
    $a2 = mysqli_real_escape_string($conn, $_POST['a2']);
    $a31 = mysqli_real_escape_string($conn, $_POST['a31']);
    $a32 = mysqli_real_escape_string($conn,$_POST['a32']);
    $a4 = mysqli_real_escape_string($conn,$_POST['a4']);
    $a5 = mysqli_real_escape_string($conn,$_POST['a5']);
    $a6 = mysqli_real_escape_string($conn,$_POST['a6']);
    $a6 = mysqli_real_escape_string($conn,$_POST['a6']);
    $a7 = 'test7';
    $a81 = mysqli_real_escape_string($conn,$_POST['a81']);
    $a82 = mysqli_real_escape_string($conn,$_POST['a82']);
    $a83 = mysqli_real_escape_string($conn,$_POST['a83']);
    $a84 = mysqli_real_escape_string($conn,$_POST['a84']);
    $a85 = mysqli_real_escape_string($conn,$_POST['a85']);
    $a91 = mysqli_real_escape_string($conn,$_POST['a91']);
    $a92 = mysqli_real_escape_string($conn,$_POST['a92']);
    $a10 = mysqli_real_escape_string($conn,$_POST['a10']);

    $duration = mysqli_real_escape_string($conn,$_POST['duration']);
    $startTime = mysqli_real_escape_string($conn,$_POST['startTime']);
    $stopTime = mysqli_real_escape_string($conn,$_POST['stopTime']);
    

    $grade = '8';
    $matric_no = mysqli_real_escape_string($conn, $_SESSION['MatricNo']);
    $name = mysqli_real_escape_string($conn,$_SESSION['Name']);
    $percentage = '100';

    $queryResult = "INSERT INTO results(Matric_No, Duration, Start_Time, Stop_Time, Grade) VALUES('$matric_no', '$duration', '$startTime', '$stopTime', '$grade')";
    
    $queryId = "SELECT * FROM results ORDER BY Result_Id DESC LIMIT 1";

    $resultId = mysqli_query($conn, $queryId);
    $row = mysqli_fetch_assoc($resultId);
    $latestResultId = $row['Result_Id'];
    $queryAnswer = "INSERT INTO answers(Result_Id, Ans_1, Ans_2, Ans_31, Ans_32, Ans_4, Ans_5, Ans_6, Ans_7, Ans_81, Ans_82, Ans_83, Ans_84, Ans_85, Ans_91, Ans_92, Ans_10) VALUES('$latestResultId', '$a1', '$a2', '$a31', '$a32', '$a4', '$a5', '$a6', '$a7', '$a81', '$a82', '$a83', '$a84', '$a85', '$a91', '$a92', '$a10')";

    if(mysqli_query($conn, $queryResult) && mysqli_query($conn, $queryAnswer)){

        
        
        // Insert into results db
        $_SESSION['start'] = $startTime;
        $_SESSION['end'] = $stopTime;
        $_SESSION['grade'] = $grade;
        $_SESSION['dur'] = $duration;
        $_SESSION['per'] = $percentage;
        header('Location: '.ROOT_URL.'questions/marks.php?completed=true');
        exit();
    }
    
    else{
        echo 'ERROR'. mysqli_error($conn);
    }


}else{

    // header('Location: '.ROOT_URL.'login/index.php?error=wtf');
    // exit();
}