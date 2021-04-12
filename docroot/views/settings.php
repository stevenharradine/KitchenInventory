<?php
	class Settings_View {
		const defaultDisplayColumns = array (
			"name",
			"image",
			"size",
			"units",
			"qty"
		);

		function print ($result, $displayColumns=self::defaultDisplayColumns) {
			echo "<table class='productTable'>";
			echo "<thead>";
			echo "	<tr>";
			echo "		<th>SETTING_ID</th>";
			echo "		<th>key</th>";
			echo "		<th>value</th>";
			echo "	</tr>";
			echo "</thead>";
			while($row = $result->fetch_assoc()) {
				echo "	<tr>";
				echo "		<td>$row[SETTING_ID]</td>";
				echo "		<td>$row[key] ($row[type])</td>";
				echo "		<td>$row[value]</td>";
				echo "	</tr>";
			}
			echo "</table>";
		}
	}
?>