<?php 

echo $a1 = $_POST['a1'];
echo $a2 = $_POST['a2'];
echo $a31 = $_POST['a31'];
echo $a32 = $_POST['a32'];
echo $a4 = $_POST['a4'];
echo $a5 = $_POST['a5'];
echo $a6 = $_POST['a6'];
echo $a81 = $_POST['a81'];
echo $a82 = $_POST['a82'];
echo $a83 = $_POST['a83'];
echo $a84 = $_POST['a84'];
echo $a85 = $_POST['a85'];
echo $a91 = $_POST['a91'];
echo $a92 = $_POST['a92'];
echo $a10 = $_POST['a10'];

echo $duration = $_POST['duration'];
echo $startTime = $_POST['startTime'];
echo $stopTime = $_POST['stopTime'];


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

    <title>Thank you for your time!</title>

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
        <h1 class="h1 text-white">Thank you for your time</h1>
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
                <p style="font-size : 40px"> Summary of your attempts : <strong> 80 %</strong></p>
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
                            <td>4.00 out of 5.00 (80%)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="index.html" class="btn btn-primary btn-lg mt-5">Done</a>
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