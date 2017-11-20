<?php require "session.php" ?>



<?php
  // If coming from the form POST
  if (isset($_POST['username'])){
    // make a connection to the db
    require "utilities.php";

    // fine one user by the username
    $connection = getConnection();

    // hash the password in the superglobal
    $password = md5($_POST['password']);

    // check it against the one in the record
    $result = $connection->query(
      "SELECT * FROM users WHERE username = '$_POST[username]'"
    );

    $user = $result->fetch_assoc();

    if(empty($user)) {
      header('Location: login.php');
    } else if ($password == $user['password']) {
      $_SESSSION['userID'] = $user['id'];
      header('Location: index.php');
    } else {
      header('Location: login.php');
    }

    // if good, redirect to index.php, if not redirect to login.php

  }
?>

<?php require "header.php" ?>
<?php require "navbar.php" ?>

<form method="POST" id="login">
  <label for="username">Username</label>
  <input type="text" name="username" id="username">
  <br>
  <label for="password">Password</label>
  <input type="password" name="password" id="password">
  <br>
  <button>Log In</button></br>
  <p>Don't have an account? Register <a href="register.php">Here</a></p>
</form>

<?php require "footer.php" ?>
