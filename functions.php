<?php 
function connect() {
	$dsn = 'mysql:host=localhost;dbname=moore_joshua_db';
	$user = "root";
	$pass = "";
	$db = null;

	try {
		$db = new PDO($dsn, $user, $pass);
	} catch (PDOException $e) {
		echo "Error connecting to database";
	}
	return $db;
}

function redirect($location){
	header($location);
	die();
}

function getCurDate() {
	date_default_timezone_set('America/Los_Angeles');
	return date("Y-m-d H:i:s");
}
?>