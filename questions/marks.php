<?php

require('../config/db.php');

if($_GET['completed'] == 'true'){
    session_start();
    
    $name = $_SESSION['Name'];
    $percentage = $_SESSION['per'];
    $duration = $_SESSION['dur'];
    $startTime = $_SESSION['start'];
    $stopTime = $_SESSION['end'];
    $grade = $_SESSION['grade'];
}

else{
    header('Location: '.ROOT_URL.'questions/index.php?error=noAttempt');
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Thank you, <?php echo $name; ?>!</title>

    <style>
        body {
            background-image: url("images_q/fire.gif");
            background-size: cover;
            height: 100%;
        }

        #cmain {

            background-color: rgba(206, 221, 228, 0.6);
            color: #394652;
        }
    </style>
</head>

<body>
    <div class="container mt-5 text-center">
        <h1 class="h1 text-white">Thank you for your time, <?php echo $name; ?></h1>
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <p style="font-size : 40px"> Summary of your attempts : <strong><?php echo $percentage ?>%</strong></p>
                <table class="table table-dark table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Started on</th>
                            <td><?php echo $startTime ?></th>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>Finished</td>
                        </tr>
                        <tr>
                            <th>Completed on</th>
                            <td><?php echo $stopTime ?></td>
                        </tr>
                        <tr>
                            <th>Time taken</th>
                            <td><?php echo $duration ?></td>
                        </tr>
                        <tr>
                            <th>Grade</th>
                            <td><?php echo $grade ?> out of 8 (<?php echo $percentage ?>%)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="index.php" class="btn btn-primary btn-lg mt-5">Done</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>