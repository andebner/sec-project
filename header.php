<?php

	session_start();

?>

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

		<header>
			
			<nav class="navbar navbar-dark justify-content-between" style="background-color: darkmagenta;">

				<a href="index.php" class="nav-link" style="color: lightcyan;">Home</a>
				
				<div>

					<?php

						if (isset($_SESSION['uName'])) {

							echo '

								<form action="includes/logout.inc.php" method="post" class="form-inline pr-3">
									<button  class="btn btn-danger" type="submit" name="logout-submit">Logout</button>
								</form>

								';

						}

						else {

							echo '

								<div>ERROR</div>
							
							';

						}

					?>
		
				</div>

			</nav>

		</header>