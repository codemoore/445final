<?php 
include "head.php";
?>
	<div class="container">
		<form id="login" action="loginVerify.php" method="post">
			<div class="form-group">
				<label for="email-form">Email Address</label>
				<input type="email" class="form-control" name="email" id="email-form" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="password-form">Password</label>
				<input type="password" class="form-control" name="password" id="password-form" placeholder="Enter password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form> <br>
		<?php if ( isset($_GET["loginfail"])){ ?>
			<div class="alert alert-danger" role="alert">
				<p id="error">
					Incorrect user name / password.  Please try again.
				</p>
			</div>
		<?php } ?>
	</div>

<?php
include "foot.php";
?>