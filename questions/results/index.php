<?php

session_start();
$name = $_SESSION['Name'];
$matricNo = $_SESSION['MatricNo'];
require('../../config/db.php');

$query = "SELECT * FROM results WHERE Matric_No = '$matricNo' ";
// Get result
$result = mysqli_query($conn, $query);
// Fetch data
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="results.css"> -->
    <title>Hello, world!</title>
</head>

<style>

body{
    background: url(../images_q/background.jpg);
}

</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./">Critical Thinking Test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Results <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../scoreboard">Scoreboard</a>
                </li>
            </ul>
            <form method="POST" action="../" class="form-inline my-2 my-lg-0">
                <button name="logout" class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="card p-5 shadow-lg mb-4">
            <h1 class="mb-4">Your past results, <?php echo $name; ?></h1>
    
            <?php foreach($questions as $question) : ?>
    
            <div class="card mb-4 shadow" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">You scored <?php echo $question['Grade'] ?> out of 8</h5>
                    <p class="card-text">Start Time: <strong><?php echo $question['Start_Time'] ?></strong></p>
                    <p class="card-text">End Time: <strong><?php echo $question['Stop_Time'] ?></strong></p>
                    <p class="card-text">You took <strong><?php echo $question['Duration'] ?></strong> to complete it.</p>
                </div>
            </div>
    
            <?php endforeach; ?>
        </div>


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>