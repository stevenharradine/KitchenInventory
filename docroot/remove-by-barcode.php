<?php
  $title = 'Remove';
  include 'views/header.php';
  include 'models/products.php';

  $productModel = new Products();
  $dbConnection = Database::connect();

  $productModel->decQty ($dbConnection, $_POST[barcode]);
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
    $productTableView = new productTable_View ();
    $productTableView->print($result, $productTableDisplayColumns);
  } else {
    include 'views/productNotFound.php';
  }
  include 'views/removeByBarcode.php';

  include 'views/footer.php';
?>