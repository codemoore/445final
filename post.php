<?php
include "functions.php";
include "head.php";
?>

<div class="container" id="post"> 
<?php
	if(isset($_GET["id"])) {
		$db = connect();
		$sql = 		"SELECT p.title, p.description,  p.dateCreated, u.email, i.name, i.description
					FROM posts AS p, items as i, users as u
					WHERE p.seller_item_id = i.id AND i.Users_email = u.email AND p.id = " . $_GET["id"] . ";";
		$posts = $db->query($sql);
		$sql2 = 	"SELECT i.filePath
					FROM images as i, posts as p 
					WHERE i.Items_id = p.seller_item_id AND p.id = " . $_GET["id"] .";";
		$images = $db->query($sql2);

		if($posts != null) {
			foreach ($posts as $post) {
				?>
				<h2><?php echo $post[0]; ?></h2>
				<?php echo "<h4>Posted by <a href='./user.php?email=". $post[3] . "'>" . $post[3] . "</a> at " . $post[2] . "</h4>";?>
				<p> <?php echo $post[1]; ?></p>
				<div class="container">
					<h3> <?php echo $post[4]; ?> </h3>
					<p><?php echo $post[5]; ?></p>
					<div class="container"> 
					<?php foreach ($images as $image) {?>
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