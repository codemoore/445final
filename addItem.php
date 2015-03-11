<?php
include "head.php";
?>

<div class="container"> 
	<h2>Add a new Item</h2>
	<form>
		<label for="item-name">Item Name</label>
		<div class="form-group">
			<input id="item-name" type="text" placeholder="Item Name">
		</div>
		<label for="item-decript">Description</label>
		<div class="form-group">
			<textarea id="item-decript" name="item-descript" rows="5" cols="50" max="300"> </textarea>
		</div>
		<label>Images</label>
		<div class="form-group">
			<input name="files" type="file">
		</div>
	</form>
</div>

<?php
include "foot.php";
?>