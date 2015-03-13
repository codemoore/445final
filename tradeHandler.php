<?php
include "functions.php";

if(isset($_POST["bought-item"])) {
	$db = connect();
	#gets email for seller from sold-item
	$getSeller = "SELECT Users_email
				 FROM items
				 WHERE id =" . $_POST["sold-item"] .";";
	#gets email for buyer from bought-item
	$getBuyer = "SELECT Users_email
				 FROM items
				 WHERE id =" . $_POST["bought-item"] .";";
	$seller = $db->query($getSeller);
	$seller = $seller->fetch()[0];
	$buyer = $db->query($getBuyer);
	$buyer = $buyer->fetch()[0];
	#set the buyer_item_id to the buyer's item
	$setBuyerID = "UPDATE posts SET buyer_item_id = " . $_POST["bought-item"] . 
					" WHERE id = " . $_POST["post"] . ";";
	#swap owners of
	$changeSoldOwner = "UPDATE items 
						SET Users_email = '" . $buyer .
						"' WHERE id = " . $_POST["sold-item"] . ";";
	$changeBoughtOwner = "UPDATE items 
						SET Users_email = '" . $seller .
						"' WHERE id = " . $_POST["bought-item"] . ";";
	// #if the buyer item is part of a post set the post to sold by put the seller item in 'buyer_item_id'
	// $buyerItemPost = "SELECT *
	// 				 FROM posts
	// 				 WHERE seller_item_id =" . $_POST["bought-item"] . ";";
	// $
	// if(count($buyerItemPost) > 0) {
	// 	foreach ()
	// } 	
	$db->exec($setBuyerID) or die("setBuyer failed" . mysql_error());
	$db->exec($changeSoldOwner or die("changeSold failed" . mysql_error()));
	$db->exec($changeBoughtOwner) or die("changeBuyer failed" . mysql_error());
	redirect("location: ./user.php");
}
?>