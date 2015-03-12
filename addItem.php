<?php
include "head.php";
?>

<div class="container"> 
	<h2>Add a new Item</h2>
	<form action="query.php" type="post">
		<label for="item-name">Item Name</label>
		<div class="form-group">
			<input id="item-name" name="item-name" type="text" placeholder="Item Name">
		</div>
		<label for="item-decript">Description</label>
		<div class="form-group">
			<textarea id="item-decript" name="item-descript" rows="5" cols="50" max="300"> </textarea>
		</div>
		<label>Images</label>
		<div class="form-group" id="choose-file">
			<input name="file0" type="file">
		</div>
		<div class="form-group">
			<button type="button" id="add-image" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add another image</button>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

<?php
include "foot.php";
?>