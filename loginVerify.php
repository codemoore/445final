<?php
include 'functions.php';

$email = $_POST["email"];
$password = $_POST["password"];

#check to see if name and pass are correct
$db = connect();
#get all users with email and password matching input
$sql = 'SELECT *
		FROM users as u
		WHERE u.email = "' . $email . '" AND u.password = "' . $password . '";';
$posts = $db->query($sql);
if($posts->fetch()  != null){
	#if there is user present with that email and pass put the email into the session 
	session_start();
	$_SESSION["email"] = $email;
	redirect("location: ./index.php"); #send to todlist
}else{ #on fail redirect back with a failure message
	redirect("location: ./login.php?loginfail=true");
}
?>
