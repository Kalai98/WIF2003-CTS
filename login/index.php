<?php
require('../config/db.php');
session_start();

if(!empty($_SESSION['MatricNo'])){
    header('Location: '.ROOT_URL.'questions/');
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

  <link href="login.css" rel="stylesheet">

  <title>Web Programming</title>
</head>

<body>

  <div class="container box">
    <form role="form" method="post" class="form login" action="login.inc.php">
      <h1 class="text-center text-uppercase">Login</h1>
      <?php
      // Check for error message
      if (isset($_GET['error'])) {

        // Not logged in
        if ($_GET['error'] == 'notLoggedIn') {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Please Log In<button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }

        // Account doesn't exist
        else if ($_GET['error'] == 'notRegistered') {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><a href="../signup" class="alert-link">Create an account</a><button type="button" class="close btn btn-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }

        // Wrong password
        else if ($_GET['error'] == 'wrongPassword') {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Incorrect<button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        
        // Wrong password
        else if ($_GET['error'] == 'wrongPassword') {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Incorrect<button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        
      }
      ?>
      <div class="form-group">
        <input name="login" class="form-control" type="text" placeholder="E-mail or Username" required>
      </div>
      <div class="form-group">
        <input name="password" class="form-control" type="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <button id="login-btn" name="submit" class="btn btn-block" type="submit">Login</button>
      </div>
      <footer>
        <a id="link" href="../signup/">Create new account</a>
      </footer>
    </form>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>