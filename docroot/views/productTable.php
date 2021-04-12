<?php

class productTable_View {
  function print ($result, $productTableDisplayColumns=null) {
    echo "      <table>";
    echo "      <thead>";
    echo "        <tr>";
    if (in_array("PRODUCT_ID", $productTableDisplayColumns) || !isset($productTableDisplayColumns)) echo "          <th>Product ID</th>";
    if (in_array("barcode", $productTableDisplayColumns) || !isset($productTableDisplayColumns))    echo "          <th>Barcode</th>";
    if (in_array("name", $productTableDisplayColumns) || !isset($productTableDisplayColumns))       echo "          <th>Product</th>";
    if (in_array("size", $productTableDisplayColumns) || !isset($productTableDisplayColumns))       echo "          <th>size</th>";
    if (in_array("units", $productTableDisplayColumns) || !isset($productTableDisplayColumns))      echo "          <th>units</th>";
    if (in_array("qty", $productTableDisplayColumns) || !isset($productTableDisplayColumns))        echo "          <th>qty</th>";
    echo "        </tr>";
    echo "      </thead>";
    echo "      <tbody>";

    while($row = $result->fetch_assoc()) {
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
      if (in_array("PRODUCT_ID", $productTableDisplayColumns) || !isset($productTableDisplayColumns)) echo "<td>$row[PRODUCT_ID]</td>";
      if (in_array("barcode", $productTableDisplayColumns) || !isset($productTableDisplayColumns))    echo "<td><center><svg class='barcode' $format_fragment jsbarcode-value='$row[barcode]' jsbarcode-height='40' jsbarcode-textmargin='0' jsbarcode-fontoptions='bold'></svg></center></td>";
      if (in_array("name", $productTableDisplayColumns) || !isset($productTableDisplayColumns))       echo "<td><a href='viewProduct.php?barcode=$row[barcode]'>$row[name]</a></td>";
      if (in_array("size", $productTableDisplayColumns) || !isset($productTableDisplayColumns))       echo "<td>$row[size]</td>";
      if (in_array("units", $productTableDisplayColumns) || !isset($productTableDisplayColumns))      echo "<td>$row[unit]</td>";
      if (in_array("qty", $productTableDisplayColumns) || !isset($productTableDisplayColumns))        echo "<td>$row[qty]</td>";
      echo "</tr>";
    }

            echo "</tbody>";
          echo "</table>";
          echo "<script>";
          echo "  JsBarcode('.barcode').init();";
          echo "</script>";
    }
}
