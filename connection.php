<?php
	$con = mysqli_connect('localhost', 'root', '', 'LibraryDB') or die('Database did not find !');
	$host = '127.0.0.1';
	$dbname = 'LibraryDB';
	$user = 'root';
	$password = '';
	$charset = 'utf8';
	$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		]
	);

?>