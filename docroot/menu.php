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
      <li><a href="add.php">Add</a></li>
      <li><a href="remove.php">Remove</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="inventory.php">Inventory</a></li>
      <li><a href="admin/list-all-products.php">Admin Panel</a></li>
    </ul>