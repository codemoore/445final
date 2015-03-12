<?php 
include "head.php";

$db = connect();
	$sqlH = "SELECT p.title, p.description, i.name, u.email, img.filePath, p.dateCreated, p.id
			FROM posts AS p, items as i, users as u, images as img
			WHERE p.seller_item_id = i.id AND i.Users_email = u.email AND i.id = img.Items_id 
			AND p.seller_item_id = i.id OR p.buyer_item_id = i.id AND u.Users_email = " . $user .
			"GROUP BY p.id;";
	$postH = $db->query($sqlH);

	$sqlT = "";
	$postT = $db->query($sql);

	$sqlI = "";
	$postI = $db->query($sql);
	// echo '<ul class="media-list">';
	// foreach ($posts as $post) {
	// 	echo 	'<li class="media">';
	// 	echo 		'<div class="media-left">';
	// 	echo 			'<a href="#">';
 //        echo 				'<img class="media-object" src=' . $post[4] . ' alt=' . $post[2] . ' style="height:128px; width:128px;"></a>';
 //        echo 		"</div>";
 //        echo 		'<div class="media-body">';
 //        echo 			'<a href="./post.php?id=' . $post[6] . '"><h4 class="media-heading">' . $post[0] . '</h4></a>';
 //        echo 			'<p>' . $post[1] . '</p>'; 
 //        echo 			"<a href='./user.php?email=" . $post[3]. "'>" . $post[3] . "</a> <span>" . $post[5] . "</span>";
 //        echo 		"</div>";
 //        echo 	'</li>';    	
	// }
	// echo "</ul>";

?>

<div class="container" id="user"> 
<?php 
	if(isset($_GET["email"])) {
		echo "<h2>" . $_GET["email"] . " </h2>" ?>
	<div class="container">
		<ul class="nav nav-tabs">
	  		<li role="presentation" class="active"><a href="#PostHistory">Post History</a></li>
	  		<li role="presentation"><a href="#TradeHistory">Trade History</a></li>
	  		<li role="presentation"><a href="#Items">Items</a></li>
		</ul>
		<?php 

		?>
	</div>
	<div class="container" id="content">
		<div class="container" >
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