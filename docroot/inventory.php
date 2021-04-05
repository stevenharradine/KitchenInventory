<?php
  $title = 'Inventory';
  include 'header.php';
  include 'menu.php';
  include 'database.php';

  $dbConnection = Database::connect();

  $sql = "SELECT * from `products` WHERE `qty` > 0";
  $result = $dbConnection->query($sql);

  if ($result->num_rows > 0) {
?>
    <table>
      <thead>
        <tr>
          <th>Barcode</th>
          <th>Product</th>
          <th>size</th>
          <th>units</th>
          <th>qty</th>
        </tr>
      </thead>
      <tbody>
<?php
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>$row[barcode]</td><td>$row[name]</td><td>$row[size]</td><td>$row[unit]</td><td>$row[qty]</td></tr>";
    }
  } else {
    echo '<tr><td colspan="5">You have nothing in your inventory</td></tr>';
  }

  Database::close($dbConnection);
?>
      </tbody>
    </table>
  </body>
</html>