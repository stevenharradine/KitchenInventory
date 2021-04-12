<?php
  $title = 'Add';
  include 'views/header.php';
  include 'models/products.php';

  $productModel = new Products();
  $dbConnection = Database::connect();

  $productModel->incQty ($dbConnection, $_POST[barcode]);
  $result = $productModel->search_products_by_barcode ($dbConnection, $_POST[barcode]);
  $productTableDisplayColumns = array (
    "name",
    "size",
    "units",
    "qty"
  );
  
  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/productTable.php';
  } else {
    include 'views/productNotFound.php';
  }
  include 'views/addByBarcode.php';

  include 'views/footer.php';
?>