<?php
  $title = 'Search';
  include 'views/header.php';
  include 'database.php';

  $dbConnection = Database::connect();

  $sql = "SELECT * from `products` where name LIKE '%$_POST[name]%' ";
  $result = $dbConnection->query($sql);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/productNotFoundByName.php';
  }

  include 'views/searchMoreByName.php';
  include 'views/footer.php';
?>