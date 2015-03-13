<?php
include "functions.php";
session_start();
//$con->close();
if(isset($_GET["type"])) {
	if($_GET["type"] == "TradeListDescDate") {
	printTradeList("ORDER BY p.dateCreated DESC");
	} else if ($_GET["type"] == "TradeListAscDate") {
	printTradeList("ORDER BY p.dateCreated ASC");
	} else if ($_GET["type"] == "TradeListDescTitle") {
	printTradeList("ORDER BY p.title DESC");
	} else if ($_GET["type"] == "TradeListAscTitle") {
	printTradeList("ORDER BY p.title ASC");
	}
} else if (isset($_POST["item-name"])) {
	if($_POST["item-name"] != null) {
		$db = connect();
		$getMaxId = "SELECT id
					FROM items
					ORDER BY id DESC LIMIT 1";
		$max = $db->query($getMaxId);
		$id = $max->fetch()[0] + 1;
		$newItem = "INSERT INTO Items VALUES (" . $id . ",
					 '" . $_SESSION["email"] . "', '" 
					. $_POST["item-name"] ."', '" 
					. getCurDate() ."', '" 
					. $_POST["item-descript"] . "');";
		$db->exec($newItem);
		foreach ($_FILES as $file) {
			$tmp_name = $file["tmp_name"];
	        $name = $file["name"];
	        if($name != null && $name != "") {
	        	move_uploaded_file($tmp_name, "./images/$name");
	        	$newImage = "INSERT INTO Images VALUES ('./images/" . $name . "'," . $id .");";
	        	$db->exec($newImage);
	    	}
		}
		redirect("location: ./user.php");
		//redirect("location: ./users.php?=" + $_SESSION["email"]);
	} else {
		redirect("location: ./user.php");
		#redirect back with error message
	}
} else if (isset($_POST["post-title"])) {
	if($_POST["item"] != null) {
		$db = connect();
		$getMaxId = "SELECT id
					FROM posts
					ORDER BY id DESC LIMIT 1";
		$max = $db->query($getMaxId);
		$id = $max->fetch()[0] + 1;
		$newPost = 'INSERT INTO Posts VALUES (' . $id .
					', "' . $_POST["post-title"] . '", "'
					. getCurDate() . '", "' . $_POST["post-descript"] . '", ' 
					. $_POST["item"] . ', NULL);';
		$db->exec($newPost);
	}
	redirect("location: ./user.php");
}

function printTradeList ($order) {
	header("Content-type: text/html5");
	$sql = 'SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
			FROM items AS i
			LEFT JOIN images as img ON i.id = img.Items_id 
			JOIN posts AS P ON p.seller_item_id = i.id OR p.buyer_item_id = i.id
			JOIN users AS u ON i.Users_email = u.email
			GROUP BY p.id' . ' ' . $order . ';';

	// $sql = "SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
	// 		FROM posts AS p, items as i, users as u, images as img
	// 		WHERE p.seller_item_id = i.id AND i.Users_email = u.email AND i.id = img.Items_id
	// 		GROUP BY p.id"
	// 		. " " . $order . ";";
	$db = connect();
	$posts = $db->query($sql);

	echo '<ul class="media-list">';
	foreach ($posts as $post) {
		echo 	'<li class="media">';
		echo 		'<div class="media-left">';
		echo 			'<a href="#">';
        echo 				'<img class="media-object" src=' . $post[4] . ' alt=' . $post[2] . ' style="height:128px; width:128px;"></a>';
        echo 		"</div>";
        echo 		'<div class="media-body">';
        echo 			'<a href="./post.php?id=' . $post[6] . '"><h4 class="media-heading">' . $post[0] . '</h4></a>';
        echo 			'<p>' . $post[1] . '</p>'; 
        echo 			"<a href='./user.php?email=" . $post[3]. "'>" . $post[3] . "</a> <span>" . $post[5] . "</span>";
        echo 		"</div>";
        echo 	'</li>';    	
	}
	echo "</ul>";
}

?>