<style>
.menu {
	height: 1em;
}
.menu li {
	float: left;
	list-style: none;
	height: 2em;
}
.menu a {
	padding: 5px 12px;
	border-radius: 10px;
	text-decoration: none;
	border: 1px solid black;
	background-color: black;
	color: white;
}
.menu a:hover {
	border-color: grey;
	background-color: grey;
}
.menu a[href="add.php"] {
	border: 1px solid green;
	background-color: green;
	color: white;
}

.menu a[href="add.php"]:hover {
	border: 1px solid darkgreen;
	background-color: darkgreen;
}
.menu a[href="remove.php"] {
	border: 1px solid red;
	background-color: red;
	color: white;
}
.menu a[href="remove.php"]:hover {
	border: 1px solid darkred;
	background-color: darkred;
}
</style>
    <ul class="menu">
      <li><a id="add" href="add.php">F1 - Add</a></li>
      <li><a id="remove" href="remove.php">F2 - Remove</a></li>
      <li><a id="search" href="search.php">F3 - Search</a></li>
      <li><a id="inventory" href="inventory.php">F4 - Inventory</a></li>
      <li><a id="adminpanel" href="admin/list-all-products.php">F5 - Admin Panel</a></li>
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
				document.getElementById("adminpanel").click()
			}
		};
    </script>