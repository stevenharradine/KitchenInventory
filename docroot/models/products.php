<?php
	include_once 'database.php';

	class Products {
		function incQty ($dbConnection, $barcode) {
			$sql = "UPDATE products SET qty = qty + 1 where barcode=?";
			$stmt = $dbConnection->prepare($sql);
			$stmt->bind_param("i", $barcode);
			$stmt->execute();
			$stmt->close();
		}

		function decQty ($dbConnection, $barcode) {
			$sql = "UPDATE products SET qty = qty - 1 where barcode=?";
			$stmt = $dbConnection->prepare($sql);
			$stmt->bind_param("i", $barcode);
			$stmt->execute();
			$stmt->close();
		}

		function search_products_by_barcode ($dbConnection, $barcode) {
			$sql = "SELECT * from `products` where barcode=$barcode";
			$stmt = $dbConnection->prepare($sql);
			$stmt->bind_param("i", $barcode);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}
	}
?>
