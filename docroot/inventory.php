<?php
  $title = 'Inventory';
  include 'views/header.php';
  include 'database.php';

  $dbConnection = Database::connect();

  $sql = "SELECT * from `products` WHERE `qty` > 0";
  $result = $dbConnection->query($sql);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/noInventory.php';
  }

  include 'views/footer.php';
?>
