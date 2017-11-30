<?php
function getConnection() {
  $connection = new mysqli(
    "localhost",
    "root",
    "",
    "pair off"
  );

  if ($connection->connect_error) {
    die("Connect error:" . $connection->connect_error);
  }

  return $connection;
}
