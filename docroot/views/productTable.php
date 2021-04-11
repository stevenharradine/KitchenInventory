    <table>
<?php
    $isHeaderWritten = false;

    while($row = $result->fetch_assoc()) {
      if (!$isHeaderWritten) {
        echo "      <thead>";
        echo "        <tr>";
        if (isset($row[PRODUCT_ID])) echo "          <th>Product ID</th>";
        if (isset($row[barcode]))    echo "          <th>Barcode</th>";
        if (isset($row[name]))       echo "          <th>Product</th>";
        if (isset($row[size]))       echo "          <th>size</th>";
        if (isset($row[units]))      echo "          <th>units</th>";
        if (isset($row[qty]))        echo "          <th>qty</th>";
        echo "        </tr>";
        echo "      </thead>";
        echo "      <tbody>";

        $isHeaderWritten = true;
      }

      $format_fragment = "";

      // TODO: wrap in if to make it a configurable option
/*      if (strlen ($row[barcode]) == 13) {
        $format_fragment = 'jsbarcode-format="EAN13"';
      } else if (strlen ($row[barcode]) == 12) {
        $format_fragment = 'jsbarcode-format="UPC"';
      } else if (strlen ($row[barcode]) == 8) {
        $format_fragment = 'jsbarcode-format="EAN8"';
      } else if (strlen ($row[barcode]) == 5) {
        $format_fragment = 'jsbarcode-format="EAN5"';
      } else if (strlen ($row[barcode]) == 2) {
        $format_fragment = 'jsbarcode-format="EAN2"';
      }*/

      echo "<tr>";
      if (isset($row[PRODUCT_ID])) echo "<td>$row[PRODUCT_ID]</td>";
      if (isset($row[barcode])) echo "<td><center><svg class='barcode' $format_fragment jsbarcode-value='$row[barcode]' jsbarcode-height='40' jsbarcode-textmargin='0' jsbarcode-fontoptions='bold'></svg></center></td>";
      if (isset($row[name]))echo "<td><a href='viewProduct.php?barcode=$row[barcode]'>$row[name]</a></td>";
      if (isset($row[size]))echo "<td>$row[size]</td>";
      if (isset($row[unit]))echo "<td>$row[unit]</td>";
      if (isset($row[qty]))echo "<td>$row[qty]</td>";
      echo "</tr>";
    }

?>
      </tbody>
    </table>
    <script>
      JsBarcode(".barcode").init();
    </script>