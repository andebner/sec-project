<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<title>TEXT ME - insicuro</title>
	
	</head>
	
	<body>

		<header class="pb-5">
			
			<nav class="navbar navbar-dark justify-content-between" style="background-color: darkmagenta;"></nav>

		</header>

		<main style="background-color: lavender; height: 100%;" class="container">
			
			<div class="row">

				<div class="col-sm-6 my-auto" align="center">
					
					<img src="LOGO.png" width="auto" height="auto" style="max-height: 100%; max-width: 100%;">

				</div>

				<div class="col-sm-6 container my-auto" align="center">

				<?php

					if (isset($_GET['error'])) {

						if ($_GET['error'] == "sqlerror") {
							
							echo '

								<div class="alert alert-danger">There has been an error connecting to the database. Please try again later!</div>

							';

						}

						else if ($_GET['error'] == "wrongpwd") {
							
							echo '

								<div class="alert alert-danger">You entered a wrong password!</div>

							';

						} else if ($_GET['error'] == "nouser") {
							
							echo '

								<div class="alert alert-danger">There is no user with this username!</div>

							';

						}

					} else if(isset($_GET['signup'])) {
							
							echo '

								<div class="alert alert-success">You have successfully signed up.</div>

							';

						}

				?>

					<div class="pb-4 pt-3" style="font-weight: bold; font-size: 24px; font-family: serif; color: indigo">LOGIN</div>

					<form action="includes/login.inc.php" method="POST" class="needs-validation">
						<script src="includes/form-validation.js"></script>

						<label for="uname" class="pt-3">Username</label>
						<input type="text" name="uname" class="w-50 form-control" required>
						<div class="invalid-feedback">Username is required</div>

						<label for="pwd" class="pt-3">Password</label>
						<input type="password" name="pwd" class="w-50 form-control" required>
						<div class="invalid-feedback">Password is required</div>
					
						<div class="pb-4 pt-3">
							<button type="submit" name="login-submit" class="btn btn-info w-25">Login</button>
						</div>
					
					</form>
					
					<div class="pb-4">
						<a href="signup.php" class="btn btn-outline-info w-30">Sign Up</a>
					</div>
					
				</div>

			</div>

		</main>

		<footer class="pt-5" style="text-align: center; width: 100%; bottom: 0;">
	
				<div>&copy 2020 - DREAM TEAM</div>

		</footer>