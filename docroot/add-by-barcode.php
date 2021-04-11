<?php
  $title = 'Add';
  include 'views/header.php';
  include 'models/products.php';

  $dbConnection = Database::connect();

  incQty ($dbConnection, $_POST[barcode]);
  $result = search_products_by_barcode ($dbConnection, $_POST[barcode]);
  
  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/productNotFound.php';
  }
  include 'views/addByBarcode.php';

  include 'views/footer.php';
?>