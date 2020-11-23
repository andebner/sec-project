<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<title>TEXT ME</title>
	
	</head>
	
	<body>

		<header class="pb-5">
			
			<nav class="navbar navbar-dark justify-content-between" style="background-color: darkmagenta;"></nav>

		</header>

		<main style="background-color: lavender; height: 500px;" class="container">
			
			<div class="row">

				<div class="col-6">
					
					<p>WELCOME!</p>

				</div>

				<div class="col-6 container" style="padding-left: 150px;">

					<div class="pb-4 pt-5" style="padding-left: 110px; font-weight: bold; font-size: 24px; font-family: serif; color: indigo">LOGIN</div>

					<form action="includes/login.inc.php" class="needs-validation">
						<script src="includes/form-validation.js"></script>

						<label for="uname" class="pt-3">Username</label>
						<input type="text" name="uname" class="w-75 form-control" required>
						<div class="invalid-feedback">Username is required</div>

						<label for="pwd" class="pt-3">Password</label>
						<input type="password" name="pwd" class="w-75 form-control" required>
						<div class="invalid-feedback">Password is required</div>

						<div class="pt-3 pb-3">
							<a href="resetpwd.php" class="w-50" style="color: mediumpurple">Forgot your password?</a>
						</div>
					
						<div class="pb-4" style="padding-left: 102px">
							<button type="submit" class="btn btn-info w-25">Login</button>
						</div>
					
					</form>
					
					<div style="padding-left: 100px">
						<a href="signup.php" class="btn btn-outline-info w-30">Sign Up</a>
					</div>
					
				</div>

			</div>

		</main>

<?php

	require "footer.php"

?>