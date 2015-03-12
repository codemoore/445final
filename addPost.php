<?php
include "head.php";
include 'functions.php';
?>

<div class="container"> 
	<h2>Add a new Item</h2>
	<form action="query.php" method="post">
		<label for="post-title">Post Title</label>
		<div class="form-group">
			<input id="post-title" name="post-title" type="text" placeholder="Title">
		</div>
		<label for="post-decript">Description</label>
		<div class="form-group">
			<textarea id="post-decript" name="post-descript" rows="5" cols="50" max="300"> </textarea>
		</div>
		<div class="form-group">
			<select class="form-control" name="item">
				<?php
				$db = connect();
				$sql = "SELECT id, name
						FROM items
						WHERE Users_email ='" . $_SESSION["email"] . "';";
				$posts = $db->query($sql);
				echo $sql;
				foreach ($posts as $post) {
					echo '<option value="' . $post[0] . '"  selected>' . $post[1] . '</option>';
				}
				?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

<?php
include "foot.php";
?>