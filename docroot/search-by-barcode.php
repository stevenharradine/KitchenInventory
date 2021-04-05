<?php
  $title = 'Search';
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
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>$row[barcode]</td><td>$row[name]</td><td>$row[size]</td><td>$row[unit]</td><td>$row[qty]</td></tr>";
    }

?>
      </tbody>
    </table>
<?php
  } else {
    echo 'Error product not found you should <a href="create.php?barcode='.$_POST['barcode'].'">create it</a><script>window.location.href="create.php?barcode='.$_POST['barcode'].'"</script>';
  }

  Database::close($dbConnection);
?>

    <h1>Search more</h1>
    <form action="search-by-barcode.php" method="post">
      <table>
        <tbody>
          <tr>
            <th>Barcode</th>
            <td><input type="text" name="barcode" id="barcode" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="Add to inventory" /></td>
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