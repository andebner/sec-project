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

		<header class="pb-3">
			
			<nav class="navbar navbar-dark justify-content-between" style="background-color: darkmagenta;">
				
				<div class="mx-auto" style="font-weight: bold; color: lightcyan; font-size: 20px">
					Sign Up
				</div>

			</nav>

		</header>

		<main style="background-color: lavender;" class="container h-90">

			<?php 

				if (isset($_GET['error'])) {

					if ($_GET['error'] == "sqlerror") {
							
						echo '

							<div class="alert alert-danger">There has been an error connecting to the database. Please try again later!</div>';

					} else if ($_GET['error'] == "sqlerror2") {
							
						echo '

							<div class="alert alert-danger">There has been an error connecting to the database. Please try again later!</div>';

					} else if ($_GET['error'] == "usertaken") {
							
						echo '

							<div class="alert alert-danger">The username has already been taken!</div>';

					}

				}

			?>

			<div class="d-flex justify-content-center align-items-center container">

				<form action="includes/signup.inc.php" method="POST" class="needs-validation">
					<script src="includes/form-validation.js"></script>
	
					<div class="form-group">
						<label for="firstName" class="control-label">Firstname</label>
						<input type="text" id="firstName" name="firstname" class="form-control" required>
	   					<div class="invalid-feedback">Valid first name is required</div>
	   				</div>
	   			
	   				<div class="form-group">
	   					<label for="lastName" class="control-label">Lastname</label>
						<input type="text" id="lastName" name="lastname" class="form-control" required>
	    				<div class="invalid-feedback">Valid last name is required</div>
	   				</div>
	   			
	   				<div class="form-group">
						<label for="username" class="control-label">Username</label>
						<input type="text" id="username" name="username" class="form-control" required>
	   					<div class="invalid-feedback">Username is required</div>
	   				</div>
	   			
	   				<div class="form-group">
	   					<label for="email" class="control-label">Email</label>
						<input type="email" id="email" name="email" class="form-control" required>
						<div class="invalid-feedback">Valid e-mail is required</div>
	   				</div>
	   			
	   				<div class="form-group">
	   					<label for="password" class="control-label">Password</label>
	   					<input type="password" id="password" name="password" class="form-control" required>
	   					<div class="invalid-feedback">Password is required</div>
	   				</div>
	   			
	   				<div class="form-group text-center">
	   					<button type="submit" name="signup-submit" class="btn btn-info" >Submit</button>
	   				</div>

	   				<div class="pb-2 text-center">
						<button class="btn btn-outline-secondary py-1" onclick="document.location = 'index.php'">Back</button>
					</div>

				</form>

			</div>

		</main>

<?php

	require "footer.php"

?>