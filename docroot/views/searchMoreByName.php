    <h1>Search more</h1>
    <form action="search-by-name.php" method="post">
      <table>
        <tbody>
          <tr>
            <th>Product name</th>
            <td><input type="text" name="name" id="name" /></td>
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
  var input = document.getElementById('name');
  input.focus();
  input.select();
}
    </script>