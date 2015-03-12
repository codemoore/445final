<?php 
include "head.php";
include "functions.php";
$db = connect();

$sqlH = "SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
		FROM posts AS p, items as i, users as u, images as img
		WHERE u.email = '" . $_GET["email"] .  "' AND p.seller_item_id = i.id AND i.Users_email = u.email AND i.id = img.Items_id 
		AND p.seller_item_id = i.id OR p.buyer_item_id = i.id GROUP BY p.id;";
$postH = $db->query($sqlH);

$sqlT = "SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
		FROM posts AS p, items as i, users as u, images as img
		WHERE u.email = '" . $_GET["email"] .  "' AND p.seller_item_id = i.id AND p.buyer_item_id <> null 
		AND i.Users_email = u.email AND i.id = img.Items_id 
		AND p.seller_item_id = i.id OR p.buyer_item_id = i.id GROUP BY p.id;";
$postT = $db->query($sqlT);

$sqlI = 'SELECT i.id, i.name, i.dateAdded,  i.description, img.filePath
		FROM  items as i, images as img
		WHERE i.Users_email = "' . $_GET["email"] . '" AND img.Items_id = i.id
		GROUP BY i.id;';
$postI = $db->query($sqlI);
?>

<div class="container" id="user"> 
<?php 
	if(isset($_GET["email"])) {
		echo "<h2 id='user-email'>" . $_GET["email"] . "</h2>" ?>
	<?php if(isset($_SESSION["email"])) { ?> 
	<div class="container" style="margin-top:1em;margin-bottom:1em;"> 
		<form action="addItem.php" method="post">
			<button id="new-post" type="button" class="btn btn-primary">New Post</button>
		</form>
		<form action="addPost.php" method="post">
			<button id="add-item" type="button" class="btn btn-primary">Add Item</button>
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
	} else {
		echo "not get";
	}
?>
</div>
<?php
include "foot.php";
?>