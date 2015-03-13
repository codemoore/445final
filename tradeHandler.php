<?php
include "functions.php";

if(isset($_POST["bought-item"])) {
	$db = connect();
	$getSeller = "SELECT Users_email
				 FROM items
				 WHERE id =" . $_POST["sold-item"] .";";
	$getBuyer = "SELECT Users_email
				 FROM items
				 WHERE id =" . $_POST["bought-item"] .";";
	$seller = $db->query($getSeller);
	$seller = $seller->fetch()[0];
	$buyer = $db->query($getBuyer);
	$buyer = $buyer->fetch()[0];
	$setBuyerID = "UPDATE posts SET buyer_item_id = " . $_POST["bought-item"] . 
					" WHERE id = " . $_POST["post"] . ";";
	$changeSoldOwner = "UPDATE items 
						SET Users_email = '" . $buyer .
						"' WHERE id = " . $_POST["sold-item"] . ";";
	$changeBoughtOwner = "UPDATE items 
						SET Users_email = '" . $seller .
						"' WHERE id = " . $_POST["bought-item"] . ";";
	#if the buyer item is part of a post
	echo $changeSoldOwner;
	echo $changeBoughtOwner;
	echo $setBuyerID;	
	$db->exec($setBuyerID) or die("setBuyer failed" . mysql_error());
	$db->exec($changeSoldOwner or die("changeSold failed" . mysql_error()));
	$db->exec($changeBoughtOwner) or die("changeBuyer failed" . mysql_error());
	redirect("location: ./user.php");
}
?>