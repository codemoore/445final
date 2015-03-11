<!DOCTYPE html>
<html>
<head>
	<title>Trade items for other items</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">					
				    <a class="navbar-brand" href="./">BarterTrade</a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" 
				         data-target=".navHeaderCollapse" id="sign-in-button">
				         <span class="icon-bar"></span>
				         <span class="icon-bar"></span>
				         <span class="icon-bar"></span>
				    </button>
				</div>		
			    <div id="navbar" class="collapse navbar-collapse">
	  				<ul class="nav navbar-nav">	
	        			<li id="tradeList"><a href="./list.php">Trade List</a></li>
	        			<li><a href="./">My Account</a></li>
	       		 	</ul>
	       		 		<?php if (isset($_SESSION["email"])) {?>
	       					<span>Logged in as: <?php $_SESSION["email"]?></span>
	       					<button type="button" class="btn btn-default navbar-btn" id="sign-out-button">Sign out</button>
	       				<?php } else { ?>
	       					<button type="button" class="btn btn-default navbar-btn" id="sign-in-button">Sign in</button>
	       				<?php } ?>
	    		</div>
			</div>
		</nav>
	</div>