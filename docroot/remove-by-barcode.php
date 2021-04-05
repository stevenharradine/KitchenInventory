<?php
  $title = 'Remove';
  include 'header.php';
  include 'menu.php';
?>
<?php
  include 'database.php';

  $dbConnection = Database::connect();

  $sql = "SELECT * from `products` where barcode=$_POST[barcode]";
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
    $sql = "UPDATE products SET qty = qty - 1 where barcode=$_POST[barcode]";
    $dbConnection->query($sql);
    
    while($row = $result->fetch_assoc()) {
      $qty = $row['qty'] - 1 < 0 ? 0 : $row['qty'] - 1;
      echo "<tr><td>$row[barcode]</td><td>$row[name]</td><td>$row[size]</td><td>$row[unit]</td><td>$qty</td></tr>";
    }
?>
      </tbody>
    </table>
<?php
  } else {
    echo 'Error product not found you should <a href="create.php?barcode='.$_POST['barcode'].'">create it</a>';
  }

  Database::close($dbConnection);
?>

    <h1>Remove more</h1>
    <form action="remove-by-barcode.php" method="post">
      <table>
        <tbody>
          <tr>
            <th>Barcode</th>
            <td><input type="text" name="barcode" id="barcode" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="Remove from inventory" /></td>
          </tr>
        </tbody>
      </table>
    </form>
    <script>
window.onload = function () {
  var input = document.getElementById('barcode');
  input.focus();
  input.select();
}
    </script>
  </body>
</html>