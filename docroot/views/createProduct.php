    <form action="create-product.php" method="post">
      <table>
        <tbody>
          <tr>
            <th>Name</th>
            <td><input id="name" type="text" name="name" value="<?php echo $name ?>" /></td>
          </tr>
          <tr>
            <th>Size</th>
            <td><input type="text" name="size" value="<?php echo $size ?>" /></td>
          </tr>
          <tr>
            <th>Unit</th>
            <td><input type="text" name="unit" /></td>
          </tr>
          <tr>
            <th>Barcode</th>
            <td><input type="text" name="barcode" value="<?php echo $_GET['barcode'] ?>" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="Add to inventory" id="submit" /></td>
          </tr>
        </tbody>
      </table>
    </form>
    <script>
window.onload = function () {
  var input = document.getElementById('name');
  input.focus();
  input.select();
}
    </script>