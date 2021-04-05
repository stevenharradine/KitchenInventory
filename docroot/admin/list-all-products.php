<?php
  $base = '../';
  $title = 'List all products';
  include $base.'header.php';
//  include 'menu.php';
?>
    <ul class="menu">
      <li><a href="../">Normie Mode</a></li>
    </ul>
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
  include $base.'database.php';

  $dbConnection = Database::connect($base);

  $sql = "SELECT * from `products`";
  $result = $dbConnection->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>$row[barcode]</td><td>$row[name]</td><td>$row[size]</td><td>$row[unit]</td><td>$row[qty]</td></tr>";
    }
  }

  Database::close($dbConnection);
?>
      </tbody>
    </table>
  </body>
</html>