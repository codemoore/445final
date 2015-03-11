<?php
	include "head.php";


?>
<div class="container">
	<div class="container" style="padding:2em;">
		<span> Order By </span>
		<form id="form">
			<select class="form-control" data-name="orderBy" id="ORDER" value="Date" style="width:6em;display:inline;">
			  <option value="Date" id="DATE" selected>Date</option>
			  <option value="Title" id="TITLE">Title</option>
			</select>
			<select class="form-control" data-name="ascBy" id="ASC" value="DESC" style="width:10em;display:inline;">
			  <option value="Asc" id="ASC">Ascending</option>
			  <option value="Desc" id="DESC" selected>Descending</option>
			</select>
		</form>
	</div>

	<div class="container" id="list">
		
	</div>
</div>

<?php
	include 'foot.php';
?>