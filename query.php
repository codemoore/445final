<?php
include "functions.php";
session_start();
//$con->close();

if(isset($_GET["type"])) { 
	#handles cases with a get request with a parameter "type"
	#used for get values for trade list (trade posts that don't have a 'buyer' yet)
	if($_GET["type"] == "TradeListDescDate") {
		#output posts Ordered by date Descending
		printTradeList("ORDER BY p.dateCreated DESC");
	} else if ($_GET["type"] == "TradeListAscDate") {
		#output posts Ordered by date ascending
		printTradeList("ORDER BY p.dateCreated ASC");
	} else if ($_GET["type"] == "TradeListDescTitle") {
		#output posts Ordered by title Descending
		printTradeList("ORDER BY p.title DESC");
	} else if ($_GET["type"] == "TradeListAscTitle") {
		#output posts Ordered by date ascending
		printTradeList("ORDER BY p.title ASC");
	}
} else if (isset($_POST["item-name"])) {
	#handles case when $_POST has field item-name aka when adding a new item
	if($_POST["item-name"] != null) { #incase item name is there, but is null
		$db = connect();
		#find the highest id value in the items table
		$getMaxId = "SELECT id
					FROM items
					ORDER BY id DESC LIMIT 1";
		$max = $db->query($getMaxId);
		#increment the highest id, to ensure unique id
		$id = $max->fetch()[0] + 1;
		#insert new item into DB
		$newItem = "INSERT INTO Items VALUES (" . $id . ",
					 '" . $_SESSION["email"] . "', '" 
					. $_POST["item-name"] ."', '" 
					. getCurDate() ."', '" 
					. $_POST["item-descript"] . "');";
		$db->exec($newItem);
		#files are the images atached to this item
		foreach ($_FILES as $file) {
			$tmp_name = $file["tmp_name"];
	        $name = $file["name"];
	        if($name != null && $name != "") {
	        	#upload the image
	        	move_uploaded_file($tmp_name, "./images/$name");
	        	#insert the image into the table
	        	$newImage = "INSERT INTO Images VALUES ('./images/" . $name . "'," . $id .");";
	        	$db->exec($newImage);
	    	}
		}
		redirect("location: ./user.php");
	} else {
		redirect("location: ./user.php");
	}
} else if (isset($_POST["post-title"])) {
	#handles case when $_POST has field post-title aka when adding a new post
	if($_POST["item"] != null) {
		$db = connect();
		#find current max post id
		$getMaxId = "SELECT id
					FROM posts
					ORDER BY id DESC LIMIT 1";
		$max = $db->query($getMaxId);
		#increment the max id to get a unique id
		$id = $max->fetch()[0] + 1;
		#insert the post into the table
		$newPost = 'INSERT INTO Posts VALUES (' . $id .
					', "' . $_POST["post-title"] . '", "'
					. getCurDate() . '", "' . $_POST["post-descript"] . '", ' 
					. $_POST["item"] . ', NULL);';
		$db->exec($newPost);
	}
	redirect("location: ./user.php");
}

#out puts the list of active posts in the order specified in $order
function printTradeList ($order) {
	header("Content-type: text/html5");
	$sql = 'SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id, p.buyer_item_id
			FROM items AS i
			LEFT JOIN images as img ON i.id = img.Items_id 
			JOIN posts AS P ON p.seller_item_id = i.id 
			JOIN users AS u ON i.Users_email = u.email
			WHERE p.buyer_item_id IS NULL
			GROUP BY p.id' . ' ' . $order . ';';

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