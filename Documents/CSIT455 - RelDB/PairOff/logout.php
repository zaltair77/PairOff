<?php require "session.php" ?>
<?php
session_destroy();
header('Location: index.php');
?>
