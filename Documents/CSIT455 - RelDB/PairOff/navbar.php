<?php require "session.php" ?>
<style><?php require 'styles.css' ?></style>
<?php
  if (isset($page) === false){
    $page='';
  }

  if (isset($_SESSION['userID'])) {
    $sessionPage = 'logout.php';
    $sessionPageLink = 'Log Out';
  }
  else {
    $sessionPage = 'login.php';
    $sessionPageLink = 'Log In or Register';
  }
?>

<nav id="navbar">
  <ul>
    <li><a class="<?php echo ($page ==='index' ? 'active-link' : '') ?>" href="index.php">Home</a></li>
    <li><a class="<?php echo ($page ==='Set Schedule' ? 'active-link' : '') ?>" href="setSchedule.php">Set Schedule</a></li>
    <li><a class="<?php echo ($page ==='pairing' ? 'active-link' : '') ?>" href="pairing.php">Pairing</a></li>
    <li><div class="dropdown"><span>
          <a id="admin-link">Admin</a>
          <div class="dropdown-content">
            <a class="<?php echo ($page ==='viewDB' ? 'active-link' : '') ?>" href="#">View Database</a>
            <a class="<?php echo ($page ==='organization' ? 'active-link' : '') ?>" href="#">Organization</a>
            <a class="<?php echo ($page ==='activities' ? 'active-link' : '') ?>" href="#">Activities</a>
          </div>
      </span></div></li>
    <li><a class="<?php echo ($page ==='userSettings' ? 'active-link' : '') ?>" href="userSettings.php">User Settings</a></li>
    <li><a href="<?php echo $sessionPage ?>"><?php echo $sessionPageLink ?></a></li>
  </ul>
</nav>
