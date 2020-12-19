<?php

	if (isset($_POST['signup-submit'])) {

		require 'dbconnection.php';

		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$uname = $_POST['username'];
		$mail = $_POST['email'];
		$pwd = $_POST['password'];

		$sql = "SELECT username FROM users WHERE username = '$uname'"; 
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {

			header("Location: ../signup.php?error=sqlerror");
			exit();

		} else {

			mysqli_stmt_execute($stmt);

			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck > 0) {

				header("Location: ../signup.php?error=usertaken");
				exit();

			} else {

				$sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$fname', '$lname', '$uname', '$mail', '$pwd')";

				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {

					header("Location: ../signup.php?error=sqlerror2");
					exit();

				} else {

					mysqli_stmt_execute($stmt);
					header("Location: ../index.php?signup=success");

				}

			}
			
		}

	} else {

		header("Location: ../index.php");
		exit();

	}