    <form action="remove-by-barcode.php" method="post">
      <label>Barcode</label><input type="text" name="barcode" id="barcode"/><input class="button" type="submit" value="Remove from inventory" />
    </form>
    <script>
window.onload = function () {
  var input = document.getElementById('barcode');
  input.focus();
  input.select();
}
    </script>