<?php
	include_once 'database.php';

	class Products {
		function incQty ($dbConnection, $barcode) {
			$sql = "UPDATE products SET qty = qty + 1 where barcode=$barcode";
			$result = $dbConnection->query($sql);
		}

		function decQty ($dbConnection, $barcode) {
			$sql = "UPDATE products SET qty = qty - 1 where barcode=$_POST[barcode]";
			$result = $dbConnection->query($sql);
		}

		function search_products_by_barcode ($dbConnection, $barcode) {
			$sql = "SELECT * from `products` where barcode=$barcode";
			$result = $dbConnection->query($sql);

			return $result;
		}
	}
?>
