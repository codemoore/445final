<?php
include "functions.php";
include "head.php";
?>

<div class="container" id="post"> 
<?php
	if(isset($_GET["id"])) {
		$db = connect();
		#get post and item info
		$sql = 		"SELECT p.title, p.description,  p.dateCreated, u.email, i.name, i.description, i.id, p.id
					FROM posts AS p, items as i, users as u
					WHERE p.seller_item_id = i.id AND i.Users_email = u.email AND p.id = " . $_GET["id"] . ";";
		$posts = $db->query($sql);
		#get images for item
		$sql2 = 	"SELECT i.filePath
					FROM images as i, posts as p 
					WHERE i.Items_id = p.seller_item_id AND p.id = " . $_GET["id"] .";";
		$images = $db->query($sql2);

		if($posts != null) {
			foreach ($posts as $post) { #loops through but there should only be one
				?>
				<h2><?php echo $post[0]; ?></h2> 
				<?php #if you don't own the item let you trade it
				if(isset($_SESSION["email"]) && $_SESSION["email"] != $post[3]) { 
				?>
				<form action="trade.php" method="get">
					<input style="visibility:hidden;width:0;height:0;" name="item" value=<?php echo '"' . $post[6] . '"';?>>
					<input style="visibility:hidden;width:0;height:0;" name="post" value=<?php echo '"' . $post[7] . '"';?>>
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-transfer"></span> Trade
					</button>
				</form>
				<?php } ?>
				<?php echo "<h4>Posted by <a href='./user.php?email=". $post[3] . "'>" . $post[3] . "</a> at " . $post[2] . "</h4>";?>
				<p> <?php echo $post[1]; ?></p>
				<div class="container">
					<h3> <?php echo $post[4]; ?> </h3>
					<p><?php echo $post[5]; ?></p>
					<div class="container"> 
					<?php #displays each image
					foreach ($images as $image) { 
					?>
						<img class="img-thumbnail" src=<?php echo "". $image[0]; ?>>
					<?php } ?>
					</div>
				</div>
		<?php }
		}
	}
?>

</div>

<?php
include "foot.php";
?>