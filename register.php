<?php
	include 'functions.php';
	$email = $_POST["email"];
	$password = $_POST["password"];
	$db = connect();
	$sql = 'SELECT *
			FROM users as u
			WHERE u.email = "' . $email .'";';
	$posts = $db->query($sql);
	//echo $posts->fetch();
	if(($_POST["email"] == null || $_POST["password"] == null) && $posts.length == 0) {
		redirect("location: ./login.php?registerfail=true");
	} else {
		session_start();
		#insert new user
		$newUser = "INSERT INTO Users VALUES ('"
					. $email . "', '" . getCurDate() ."', '" . $password . "');";
		$db->exec($newUser);
		$_SESSION["email"] = $email;
		redirect("location: ./index.php"); #send to todlist
	}
?>