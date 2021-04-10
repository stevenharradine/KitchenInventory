<style>
	h2 {
		display: inline-block;
	}
  h2, #productName input[type="text"] {
    margin: 15px 5px;
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
      <div id="productName"><h2><?php echo $row[name]; ?></h2><span onclick='editName()' class='button'>Edit</span></div>
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

        clearProductName()

        inputElement = document.createElement ("input")
        inputElement.setAttribute ("name", "name")
        inputElement.setAttribute ("type", "text")
        inputElement.setAttribute ("placeholder", currentName)
        inputElement.setAttribute ("value", currentName)

        cancelElement = document.createElement("span")
        cancelElement.classList.add ("button")
        cancelElement.onclick = function () { closeEditName() }
        cancelElement.textContent = "Cancel"

        saveElement = document.createElement("span")
        saveElement.classList.add ("button")
        saveElement.onclick = function () { saveName() }
        saveElement.textContent = "Save"

        document.getElementById("productName").appendChild(inputElement)
        document.getElementById("productName").appendChild(cancelElement)
        document.getElementById("productName").appendChild(saveElement)
      }

      function clearProductName () {
        parent = document.getElementById("productName")
        while (parent.firstChild) {
            parent.firstChild.remove()
        }
      }

      function closeEditName () {
      	currentName = document.getElementsByName("name")[0].getAttribute("placeholder")

        clearProductName()

        h2Element = document.createElement("h2")
        h2Element.textContent = currentName

        editElement = document.createElement("span")
        editElement.classList.add ("button")
        editElement.onclick = function () { editName() }
        editElement.textContent = "Edit"

        document.getElementById("productName").appendChild(h2Element)
        document.getElementById("productName").appendChild(editElement)
      }

      function saveName () {
      	currentName = document.getElementsByName("name")[0].value
      	barcode = document.getElementsByTagName("text")[0].innerHTML
		    location.href=location.pathname+"?barcode="+barcode+"&action=updateName&name="+currentName
      }
    </script>
