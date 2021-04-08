<?php
  $title = 'Search';
  include 'header.php';
  include 'menu.php';
?>
      <table>
        <tr>
    <form action="search-by-barcode.php" method="post">
          <th>Barcode</th>
          <td><input type="text" name="barcode" id="barcode" /></td>
          <td><input type="submit" value="Search inventory" /></td>
    </form>
        </tr>
        <tr>
    <form action="search-by-name.php" method="post">
          <th>Product Name</th>
          <td><input type="text" name="name" id="name" /></td>
          <td><input type="submit" value="Search inventory" /></td>
    </form>
        </tr>
      </table>
    <script>
window.onload = function () {
  var input = document.getElementById('barcode');
  input.focus();
  input.select();
}
    </script>
  </body>
</html>