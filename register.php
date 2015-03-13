<?php
	include 'functions.php';
	$email = $_POST["email"];
	$password = $_POST["password"];
	$db = connect();
	#gets all users with this email
	$sql = 'SELECT *
			FROM users as u
			WHERE u.email = "' . $email .'";';
	$posts = $db->query($sql);
	#if not user or pass or if the email exists failure
	if(($_POST["email"] == null || $_POST["password"] == null) && count($posts) == 0) {
		redirect("location: ./login.php?registerfail=true");
	} else {
		session_start();
		#insert new user
		$newUser = "INSERT INTO Users VALUES ('"
					. $email . "', '" . getCurDate() ."', '" . $password . "');";
		$db->exec($newUser);
		#"log" the user in by puting there email into session
		$_SESSION["email"] = $email;
		redirect("location: ./index.php"); #send to todlist
	}
?> 