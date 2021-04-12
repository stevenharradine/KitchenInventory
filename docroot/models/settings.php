<?php
	include_once 'database.php';

	class Settings {
		function fetchAll ($dbConnection) {
			$sql = "SELECT * from `settings`";
			$stmt = $dbConnection->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();

			return $result;
		}
	}
?>
