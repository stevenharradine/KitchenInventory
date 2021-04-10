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
      echo "<tr>";
      echo "<td><svg class='barcode' jsbarcode-value='$row[barcode]' jsbarcode-textmargin='0' jsbarcode-fontoptions='bold'></svg></td>";
      echo "<td><a href='viewProduct.php?barcode=$row[barcode]'>$row[name]</a></td>";
      echo "<td>$row[size]</td>";
      echo "<td>$row[unit]</td>";
      echo "<td>$row[qty]</td>";
      echo "</tr>";
    }

?>
      </tbody>
    </table>
    <script>
      JsBarcode(".barcode").init();
    </script>