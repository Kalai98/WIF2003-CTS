<?php

session_start();
$name = $_SESSION['Name'];
$matricNo = $_SESSION['MatricNo'];
require('../../config/db.php');

$query = "SELECT * FROM users INNER JOIN results ON users.Matric_No = results.Matric_No ORDER BY results.Grade DESC";
// Get result
$result = mysqli_query($conn, $query);
// Fetch data
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);


$num = 0;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="scoreboard.css">
    <title>Hello, world!</title>
</head>

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
                <li class="nav-item">
                    <a class="nav-link" href="../results">Results</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Scoreboard <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form method="POST" action="../" class="form-inline my-2 my-lg-0">
                <button name="logout" class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div id="" class="tab">
            <h1 class="mt-4">Scoreboard</h1>
            <table class=" shadow table table-light table-hover table-borderless text-center">
                <thead>
                    <tr class="d-flex bg-dark text-white">
                        <th class="col-1" scope="col">No</th>
                        <th class="col-3" scope="col">Matric No.</th>
                        <th class="col-3" scope="col">Name</th>
                        <th class="col-3" scope="col">Time Taken</th>
                        <th class="col-2" scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($questions as $question) : ?>

                    <?php if($question['Name'] == $name): ?>
                        <tr class="d-flex table-primary">
                            <th class="col-1" scope="row"><?php echo ++$num; ?></th>
                            <td class="col-3"><?php echo $question['Matric_No']; ?></td>
                            <td class="col-3"><?php echo $question['Name']; ?></td>
                            <td class="col-3"><?php echo $question['Duration']; ?></td>
                            <td class="col-2"><?php echo $question['Grade']; ?></td>
                        </tr>

                        <?php elseif($question['Name'] !== $name): ?>
                            <tr class="d-flex">
                                <th class="col-1" scope="row"><?php echo ++$num; ?></th>
                                <td class="col-3"><?php echo $question['Matric_No']; ?></td>
                                <td class="col-3"><?php echo $question['Name']; ?></td>
                                <td class="col-3"><?php echo $question['Duration']; ?></td>
                                <td class="col-2"><?php echo $question['Grade']; ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>