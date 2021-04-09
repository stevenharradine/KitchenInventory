<?php
  $title = 'Search';
  include 'views/header.php';
  include 'database.php';

  $dbConnection = Database::connect();

  $sql = "SELECT * from `products` where barcode=$_POST[barcode]";
  $result = $dbConnection->query($sql);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/productNotFound.php';
  }

  include 'views/searchMore.php';

  include 'views/footer.php';
?>