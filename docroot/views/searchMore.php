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
