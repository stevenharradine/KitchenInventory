<?php
  $title = 'View product';
  include 'views/header.php';
  include 'database.php';

  $dbConnection = Database::connect();

  if ($_REQUEST['action'] == "add") {
	$sql = "UPDATE products SET qty = qty + 1 where barcode=$_REQUEST[barcode]";
	$resultInc = $dbConnection->query($sql);
  } else if ($_REQUEST['action'] == "remove") {
	$sql = "UPDATE products SET qty = qty - 1 where barcode=$_REQUEST[barcode]";
	$resultDec = $dbConnection->query($sql);
  } else if ($_REQUEST['action'] == "updateName") {
	$sql = "UPDATE products SET name = \"$_REQUEST[name]\" where barcode=$_REQUEST[barcode]";
	$resultDec = $dbConnection->query($sql);
  }

  $sql = "SELECT * from `products` where barcode=$_REQUEST[barcode]";
  $result = $dbConnection->query($sql);

  Database::close($dbConnection);

  include 'views/productDetails.php';

  include 'views/footer.php';
?>