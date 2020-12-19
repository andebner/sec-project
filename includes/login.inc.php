<?php

	if (isset($_POST['login-submit'])) {

		require 'dbconnection.php';

		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];


			$sql = "SELECT password FROM users WHERE username = '$uname'";

			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				
				header("Location: ../index.php?error=sqlerror");

				exit();

			} else {

				mysqli_stmt_execute($stmt);

				$result = mysqli_stmt_get_result($stmt);

				if ($result = $pwd) {
						
					session_start();

					$_SESSION['uName'] = $_POST['uname'];

					header("Location: ../main.php");

					exit();

				} else {

					header("Location: ../index.php?error=wrongpwd");

					exit();

				}

			}

	}

	else {

		header("Location: ../index.php");

		exit();

	}
