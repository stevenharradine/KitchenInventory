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
      $format_fragment = "";
      if (strlen ($row[barcode]) == 13) {
        $format_fragment = 'jsbarcode-format="EAN13"';
      } else if (strlen ($row[barcode]) == 12) {
        $format_fragment = 'jsbarcode-format="UPC"';
      } else if (strlen ($row[barcode]) == 8) {
        $format_fragment = 'jsbarcode-format="EAN8"';
      } else if (strlen ($row[barcode]) == 5) {
        $format_fragment = 'jsbarcode-format="EAN5"';
      } else if (strlen ($row[barcode]) == 2) {
        $format_fragment = 'jsbarcode-format="EAN2"';
      }
      echo "<tr>";
      echo "<td><center><svg class='barcode' $format_fragment jsbarcode-value='$row[barcode]' jsbarcode-height='40' jsbarcode-textmargin='0' jsbarcode-fontoptions='bold'></svg></center></td>";
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