<?php
function getConnection() {
  $connection = new mysqli(
    "dogblog.caokxintrssz.us-east-1.rds.amazonaws.com",
    "fredonia",
    "Fall2017!!!",
    "dogblog"
  );

  if ($connection->connect_error) {
    die("Connect error:" . $connection->connect_error);
  }

  return $connection;
}
