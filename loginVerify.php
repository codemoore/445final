<?php
include 'functions.php';

$email = $_POST["email"];
$password = $_POST["password"];

#check to see if name and pass are correct
$db = connect();
$sql = 'SELECT *
		FROM users as u
		WHERE u.email = "' . $email . '" AND u.password = "' . $password . '";';
$posts = $db->query($sql);
//echo $posts->fetch();
if($posts->fetch()  != null){
	session_start();
	$_SESSION["email"] = $email;
	redirect("location: ./index.php"); #send to todlist
}else{
	redirect("location: ./login.php?loginfail=true");
}
?>
