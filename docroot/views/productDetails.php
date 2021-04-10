<style>
	h2 {
		display: inline-block;
	}
  .left {
    float: left;
    text-align: center;
    width: 300px;
  }
  .left img.product {
    display: block;
    max-height: 500px;
    max-width: 300px;
  }
  .right div {
    margin-bottom: 15px;
  }
</style>
<?php
    while($row = $result->fetch_assoc()) {
?>
      <div><h2><?php echo $row[name]; ?></h2><input onclick='editName()' type='button' value='Edit' /></div>
      <div class="left">
        <img class='product' src='images/products/<?php echo $row[barcode]; ?>.jpg' />
        <svg class='barcode' jsbarcode-value='<?php echo $row[barcode]; ?>' jsbarcode-textmargin='0' jsbarcode-fontoptions='bold'></svg>
      </div>
      <div class="right">
        <div>Size: <?php echo "$row[size] $row[unit]"; ?></div>
        <div>Qty: <?php echo $row[qty]; ?> <a href='?barcode=<?php echo $row[barcode]; ?>&amp;action=add' class='button add'>Add</a> <a href='?barcode=<?php echo $row[barcode]; ?>&amp;action=remove' class='button remove'>Remove</a></div>
    </div>
<?php
    }

?>
    <script>
      JsBarcode(".barcode").init();

      function editName () {
		currentName = document.getElementsByTagName("h2")[0].innerHTML
		document.getElementsByTagName("h2")[0].parentElement.innerHTML = "<input name='name' type='text' value='" + currentName + "' placeholder='" + currentName + "' /><input onclick='closeEditName()' type='button' value='Cancel' /><input onclick='saveName()' type='button' value='Save' />"

      }

      function closeEditName () {
      	currentName = document.getElementsByName("name")[0].getAttribute("placeholder")
      	document.getElementsByName("name")[0].parentElement.innerHTML = "<h2>" + currentName + "</h2><input onclick='editName()' type='button' value='Edit' />"
      }

      function saveName () {
      	currentName = document.getElementsByName("name")[0].value
      	barcode = document.getElementsByTagName("text")[0].innerHTML
		location.href=location.pathname+"?barcode="+barcode+"&action=updateName&name="+currentName
      }
    </script>