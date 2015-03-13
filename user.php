<?php 
include "head.php";
include "functions.php";
$db = connect();

?>

<div class="container" id="user"> 
<?php 
	if(isset($_GET["email"])) { #if there is a user email param
		#gets the user's posts, where they are a seller 
		$sqlH = "SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
			FROM items AS i
			LEFT JOIN images as img ON i.id = img.Items_id 
			JOIN posts AS P ON p.seller_item_id = i.id
			JOIN users AS u ON i.Users_email = u.email
			WHERE u.email = '" . $_GET["email"] . "'
			GROUP BY p.id";
		$postH = $db->query($sqlH);

		#gets all completed posts (has a buyer) the user was involved with
		$sqlT = "SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
				FROM items as i
				LEFT JOIN images as img ON i.id = img.Items_id 
				JOIN posts AS p ON p.seller_item_id = i.id OR p.buyer_item_id = i.id
				JOIN users as u ON i.Users_email = u.email
				WHERE u.email = '" . $_GET["email"] .  "' AND p.buyer_item_id <> null 
				 GROUP BY p.id;";
		$postT = $db->query($sqlT);

		#gets items belonging to a user
		$sqlI = 'SELECT i.id, i.name, i.dateAdded,  i.description, img.filePath
				FROM  items as i 
				LEFT JOIN images as img ON img.Items_id = i.id
				WHERE i.Users_email = "' . $_GET["email"] . 
				'" GROUP BY i.id;';
		$postI = $db->query($sqlI);


		echo "<h2 id='user-email'>" . $_GET["email"] . "</h2>" ?>
	<?php #if logged into that user lets you add items and posts
	if(isset($_SESSION["email"]) && $_SESSION["email"] == $_GET["email"]) { 
	?> 
	<div class="container" style="margin-top:1em;margin-bottom:1em;" id="add-new"> 
		<form action="addPost.php" method="post" style="display:inline;">
			<button id="new-post" type="submit" class="btn btn-primary" style="display:inline;"><span class="glyphicon glyphicon-plus"></span>New Post</button>
		</form>
		<form action="addItem.php" method="post" style="display:inline;">
			<button id="add-item" type="sumbit" class="btn btn-primary" style="display:inline;"><span class="glyphicon glyphicon-plus"></span>Add Item</button>
		</form>
	</div>
	<?php } ?>
	<div class="container">
		<ul class="nav nav-tabs">
	  		<li role="presentation" class="active"><a href="#postHistory">Post History</a></li>
	  		<li role="presentation"><a href="#tradeHistory">Trade History</a></li>
	  		<li role="presentation"><a href="#items">Items</a></li>
		</ul>
		<?php 

		?>
	</div>
	<div class="container" id="content">
		<div class="container user-info foreground" id="postHistory">
		<?php
			#print post history
			echo '<ul class="media-list">';
			foreach ($postH as $post) {
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
		?>
		</div>
		<div class="container user-info background" id="tradeHistory">
		<?php
			#prints completed transactions
			echo '<ul class="media-list">';
			foreach ($postT as $post) {
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
		?>
		</div>
		<div class="container user-info background" id="items">
		<?php
			#prints items
			echo '<ul class="media-list">';
			foreach ($postI as $post) {
				echo 	'<li class="media">';
				echo 		'<div class="media-left">';
				echo 			'<a href="#">';
		        echo 				'<img class="media-object" src=' . $post[4] . ' alt=' . $post[2] . ' style="height:128px; width:128px;"></a>';
		        echo 		"</div>";
		        echo 		'<div class="media-body">';
		        echo 			'<a href="./item.php?id=' . $post[0] . '"><h4 class="media-heading">' . $post[1] . '</h4></a>';
		        echo 			'<p>' . $post[3] . '</p>'; 
		        echo 			 "<span>" . $post[2] . "</span>";
		        echo 		"</div>";
		        echo 	'</li>';    	
			}
			echo "</ul>";
		?>
		</div>
	</div>
<?php 
	}  else if (isset($_SESSION["email"])) {
		#if $_GET[email] is not set, but the user is logged in, redirect to that user's page
		$location = "location: ./user.php?email=" . $_SESSION["email"];
		redirect($location);
	} else {
		redirect("location: ./index.php");
	}
?>
</div>
<?php
include "foot.php";
?>