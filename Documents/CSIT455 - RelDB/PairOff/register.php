<?php

// Check that all of the information is filled out
if($_SERVER['REQUEST_METHOD'] === 'POST' &&
(empty($_POST['username']) ||
empty($_POST['password']) ||
empty($_POST['confirmPassword']) ||
empty($_POST['firstName']) ||
empty($_POST['lastName']))
  ) {
    die("You must fill in all of the fields");
  } else if ( $_SERVER['REQUEST_METHOD'] === 'POST' &&
    $_POST['password'] != $_POST['confirmPassword']) {
    die("Your passwords don't match");
  } else if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // It passes all validations, so save the user and redirect to login

    $connection = new mysqli(
      "dogblog.caokxintrssz.us-east-1.rds.amazonaws.com",
      "fredonia",
      "Fall2017!!!",
      "dogblog"
    );
    if ($connection->connect_error) {
      die("Connect error:" . $connection->connect_error);
    }

    $_POST['password'] = md5($_POST['password']);

    $post = $connection->query("
      INSERT INTO users (
        username,
        password,
        first_name,
        last_name,
      ) VALUES (
          '$_POST[username]',
          '$_POST[password]',
          '$_POST[firstname]',
          '$_POST[lastname]',
      )
    ");

    if($connection->error) {
      die("Error Occured: " . $connection->error);
    }

    header("Location: login.php");
  }

 ?>

<?php require "header.php" ?>
<?php require "navbar.php" ?>

<fieldset id="registerFieldset">
  <legend><h2>Register Your Account</h2></legend>
  <form method="post" id="register">
    <label class="inputLabel" for="username">Username</label>
    <input class="inputText" type="text" name="username" value="">
    <br>

    <label class="inputLabel" for="Password">Password</label>
    <input class="inputText" type="password" name="password" id="password">
    <br>

    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
    <input class="inputText" type="password" name="confirmPassword" id="confirmPassword">
    <br>

    <label class="inputLabel" for="firstName">First Name</label>
    <input class="inputText" type="text" name="firstName" id="firstName">
    <br>

    <label id="lastName" class="inputLabel" for="lastName">Last Name</label>
    <input class="inputText" type="text" name="lastName" id="lastName">
    <br>

    <label id="adminCheck">I am an Admin</label>
    <input id="isAdmin" type="checkbox" name="adminCheck">

    <button>Register</button>
  </form>
</fieldset>

<?php require "footer.php" ?>
