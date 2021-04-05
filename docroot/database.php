<?php
class Database {
	static public function connect($base = '') {
		$passwordFile = $base.'../dbpassword';
		$myfile = fopen($passwordFile, 'r') or die('Unable to open file!');
		$password = fread($myfile,filesize($passwordFile));
		fclose($myfile);

		// Create connection
		$conn = new mysqli('localhost', 'kitcheninventory', $password, 'kitcheninventory');
		// Check connection
		if ($conn->connect_error) {
			die('Connection failed: ' . $conn->connect_error);
		}

		return $conn;
	}
	static public function close ($conn) {
		$conn->close();
	}
}