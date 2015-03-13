<?php 
include "head.php";
?>
	<div class="container">
		<form id="login"  method="post">
			<div class="form-group">
				<label for="email-form">Email Address</label>
				<input type="email" class="form-control" name="email" id="email-form" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="password-form">Password</label>
				<input max="" type="password" class="form-control" name="password" id="password-form" placeholder="Enter password">
			</div>
			<button formaction="loginVerify.php" type="submit" class="btn btn-primary">Log in</button>
			<button formaction="register.php" type="submit" class="btn btn-primary">Register</button>
		</form> <br>
		<?php if ( isset($_GET["loginfail"])){ #didplay if invalid log in ?>
			<div class="alert alert-danger" role="alert">
				<p id="error">
					Incorrect user name / password.  Please try again.
				</p>
			</div>
		<?php } ?>
		<?php if ( isset($_GET["registerfail"])){ #display if invalid registration?>
			<div class="alert alert-danger" role="alert">
				<p id="error">
					Registration failed. Invalid input or email is already registered.
				</p>
			</div>
		<?php } ?>
	</div>

<?php
include "foot.php";
?>