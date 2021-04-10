<style>
	h2 {
		display: inline-block;
	}
	.button {
		border-radius: 5px;
		padding: 3px 7px;
		text-decoration: none;
	}
	.add {
		background-color: green;
		color: white;
	}
	.remove {
		background-color: red;
		color: white;
	}
</style>
<?php
    while($row = $result->fetch_assoc()) {
      echo "<div><h2>$row[name]</h2><input onclick='editName()' type='button' value='Edit' /></div>";
      echo "<svg class='barcode' jsbarcode-value='$row[barcode]' jsbarcode-textmargin='0' jsbarcode-fontoptions='bold'></svg>";
      echo "<br />";
      echo "Size: $row[size] $row[unit]";
      echo "<br />";
      echo "<br />";
      echo "Qty: $row[qty] <a href='?barcode=$row[barcode]&amp;action=add' class='button add'>Add</a> <a href='?barcode=$row[barcode]&amp;action=remove' class='button remove'>Remove</a>";
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