<?php
  require "header.php";
  require "navbar.php";
  require "utilities.php";

  $connection = getConnection();

  $result = $connection->query("SELECT * FROM individual");

  $individuals = [];

  while ($row = $result->fetch_assoc()) {
    $individuals[] = $row;
  }

 ?>

<table id="viewDB">
  <thead>
    <tr>
      <th>Individual ID</th>
      <th>Organization ID</th>
      <th>Username</th>
      <th>Password</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($individuals as $individual) { ?>
      <tr>
        <td><?php echo $individual["Individual_ID"] ?></td>
        <td><?php echo $individual["Organization_ID"] ?></td>
        <td><?php echo $individual["Username"] ?></td>
        <td><?php echo $individual["Password"] ?></td>
        <td><?php echo $individual["Name"] ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
