<style>
.menu {
	height: 1em;
}
.menu li {
	float: left;
	list-style: none;
	height: 2em;
}
</style>
    <ul class="menu">
      <li><a id="add" class="button add" href="add.php">F1 - Add</a></li>
      <li><a id="remove" class="button remove" href="remove.php">F2 - Remove</a></li>
      <li><a id="search" class="button" href="search.php">F3 - Search</a></li>
      <li><a id="inventory" class="button" href="inventory.php">F4 - Inventory</a></li>
      <li><a id="settings" class="button" href="settings.php">F5 - Settings</a></li>
    </ul>
    <script>
		document.onkeydown = function (e) {
			e = e || window.event;

			if (e.key=="F1") {
				e.preventDefault()
				document.getElementById("add").click()
			} else if (e.key == "F2") {
				e.preventDefault()
				document.getElementById("remove").click()
			} else if (e.key == "F3") {
				e.preventDefault()
				document.getElementById("search").click()
			} else if (e.key == "F4") {
				e.preventDefault()
				document.getElementById("inventory").click()
			} else if (e.key == "F5") {
				e.preventDefault()
				document.getElementById("settings").click()
			}
		};
    </script>