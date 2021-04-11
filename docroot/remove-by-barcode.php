<?php
  $title = 'Remove';
  include 'views/header.php';
  include 'models/products.php';

  $productModel = new Products();
  $dbConnection = Database::connect();

  $productModel->decQty ($dbConnection, $_POST[barcode]);
  $result = $productModel->search_products_by_barcode ($dbConnection, $_POST[barcode]);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/productNotFound.php';
  }
  include 'views/removeByBarcode.php';

  include 'views/footer.php';
?>