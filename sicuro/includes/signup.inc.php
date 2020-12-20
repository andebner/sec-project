<?php

	if (isset($_POST['signup-submit'])) {

		require 'dbconnection.php';

		$fname = htmlspecialchars($_POST['firstname']);
		$lname = htmlspecialchars($_POST['lastname']);
		$uname = htmlspecialchars($_POST['username']);
		$mail = htmlspecialchars($_POST['email']);
		$pwd = $_POST['password'];


		$sql = "SELECT username FROM users WHERE username = ?"; 
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {

			header("Location: ../signup.php?error=sqlerror");
			exit();

		} else {

			mysqli_stmt_bind_param($stmt, "s", $username);

			mysqli_stmt_execute($stmt);

			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck > 0) {

				header("Location: ../signup.php?error=usertaken");
				exit();

			} else {

				$sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)";

				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {

					header("Location: ../signup.php?error=sqlerror");
					exit();

				} else {

					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $uname, $mail, $hashedPwd);

					mysqli_stmt_execute($stmt);

					header("Location: ../index.php?signup=success");

					exit();

				}

			}
			
		}

	} else {

		header("Location: ../index.php");
		exit();

	}