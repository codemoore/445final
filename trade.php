<?php
include "functions.php";
include "head.php";

if(isset($_GET["item"])) { ?>

<div class="container">
	<form method="post" action="tradeHandler.php">
		<div class="form-group"> 
			<h3>
				Trade
				<span class="label label-default">
				<?php
					$db = connect();
					$getName = "SELECT name 
								FROM items
								WHERE id = " . $_GET["item"] . ";";
					$posts = $db->query($getName);
					//echo $getName;
					echo $posts->fetch()[0];
				 ?>

				</span> For 
			</h3>
			<input style="visibility:hidden;width:0;height:0;" name="sold-item" value=<?php echo '"' . $_GET["item"] . '"';?>>
			<input style="visibility:hidden;width:0;height:0;" name="post" value=<?php echo '"' . $_GET["post"] . '"';?>>
			<select class="form-control" name="bought-item">
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
		<div class="form-group"> 
			<button type="submit" class="btn btn-primary">Confirm</button>

		</div>
	</form>

<?php } ?>
</div>

<?php
include "foot.php";
?>