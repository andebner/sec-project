<?php

	if (isset($_POST['login-submit'])) {

		require 'dbconnection.php';

		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];


			$sql = "SELECT * FROM users WHERE username = ?";

			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				
				header("Location: ../index.php?error=sqlerror");

				exit();

			}

			else {

				mysqli_stmt_execute($stmt);

				$result = mysqli_stmt_get_result($stmt);

				if ($row = mysqli_fetch_assoc($result)) {
					
					$pwdCheck = password_verify($pwd, $row['password']);

					if ($pwdCheck == false) {

						header("Location: ../index.php?error=wrongpwd");

						exit();

					}

					else if ($pwdCheck == true) {
						
						session_start();

						$_SESSION['userId'] = $row['uid'];
						$_SESSION['userName'] = $row['userName'];

						header("Location: ../main.php");

						exit();

					}

					else {

						header("Location: ../index.php?error=wrongpwd");

						exit();

					}

				}

				else {

					header("Location: ../index.php?error=nouser");

					exit();

				}

			}

	}

	else {

		header("Location: ../index.php");

		exit();

	}
