<?php
include "head.php";
include "functions.php";
$db = connect();
#get post and item info
$sql = 		"SELECT u.email, i.name, i.description, i.id
			FROM items as i, users as u
			WHERE  i.Users_email = u.email AND i.id = " . $_GET["id"] . ";";
$posts = $db->query($sql);
#get images for item
$sql2 = 	"SELECT i.filePath
			FROM images as i 
			WHERE i.Items_id =  " . $_GET["id"] .";";
$images = $db->query($sql2);

?>
<div class="container" id="item"> 
	<?php  $post = $posts->fetch(); #get row with item info?>
	<h3> <?php echo $post[1]; ?> </h3>
	<h4> Owned by <?php echo "<a href='user.php?email=" . $post[0] . "'</a>" . $post[0] ; ?> </h4>
	<p><?php echo $post[2]; ?></p>
	<div class="container"> 
	<?php #displays each image
	foreach ($images as $image) { 
	?>
		<img class="img-thumbnail" src=<?php echo "". $image[0]; ?>>
	<?php } ?>
	
</div>

<?php
include "foot.php";
?>