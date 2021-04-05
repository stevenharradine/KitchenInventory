<?php
  include 'database.php';

  $dbConnection = Database::connect();

  $size = strcmp($_POST['size'], '') !== 0 ? $_POST['size'] : "NULL";
  $unit = strcmp($_POST['unit'], '') !== 0 ? $_POST['unit'] : "NULL";

  $sql = "INSERT INTO `products` (barcode,name,size,unit) VALUES ($_POST[barcode],\"$_POST[name]\",$size,\"$unit\")";
  $result = $dbConnection->query($sql);

  header ("location:/search.php");