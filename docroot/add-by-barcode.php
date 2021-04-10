<?php
  $title = 'Add';
  include 'views/header.php';
  include 'database.php';

  $dbConnection = Database::connect();

  $sql = "UPDATE products SET qty = qty + 1 where barcode=$_POST[barcode]";
  $resultInc = $dbConnection->query($sql);

  $sql = "SELECT * from `products` where barcode=$_POST[barcode]";
  $result = $dbConnection->query($sql);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/productNotFound.php';
  }
  include 'views/addByBarcode.php';

  include 'views/footer.php';
?>