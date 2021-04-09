<?php
  $title = 'List all products';
  include $base.'views/header.php';
  include $base.'database.php';

  $dbConnection = Database::connect($base);

  $sql = "SELECT * from `products`";
  $result = $dbConnection->query($sql);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  }

  include 'views/footer.php';
?>
