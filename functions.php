<?php 
#connects to the database and returns the PDO object
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

#redirect page to $location
function redirect($location){
	header($location);
	die();
}

#returns the current date time in the form of a mysql DATETIME
function getCurDate() {
	date_default_timezone_set('America/Los_Angeles');
	return date("Y-m-d H:i:s");
}
?>