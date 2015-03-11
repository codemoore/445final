<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Trade items for other items</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">					
				    <a class="navbar-brand" href="./">BarterTrade</a>
				</div>		
			    <div id="navbar" class="collapse navbar-collapse">
	  				<ul class="nav navbar-nav">	
	        			<li id="list-nav" class="navLink"><a href="./list.php">Trade List</a></li>
	        				       		 		<?php 
	       		 		if (isset($_SESSION["email"])) { ?>
	       		 			<li id="myAccount" class="navLink"> <?php echo '<a href="./user.php?email=' . $_SESSION["email"] . '">My Account</a>'?> </li>
	       					<li ><p class="navbar-text" style="display:inline;"><?php echo 'Logged in as:' . $_SESSION["email"] ?> </p></li>
	       					<li><button type="button" class="btn btn-default navbar-btn" id="sign-out-button">Sign out</button> </li>
	       				<?php } else { ?>
	       					<li><button type="button" class="btn btn-default navbar-btn" id="sign-in-button">Sign in</button></li>
	       				<?php } ?>

	       		 	</ul>


	    		</div>
			</div>
		</nav>
	</div>