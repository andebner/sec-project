<?php

	session_start();

	if (isset($_POST['send-message'])) {

		require 'dbconnection.php';

		$user = $_SESSION['uName'];
		$msg = $_POST['msgtext'];

		if (preg_match("/^[a-zA-Z0-9]*$/", $msg)) {
			
			$sql = "INSERT INTO messages (user, message) VALUES ('$user', '$msg')";

			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {

				header("Location: ../main.php?send=error");
				exit();

			} else {

				mysqli_stmt_execute($stmt);
				header("Location: ../main.php?send=success");

			}


		} else {

			header("Location: ../main.php?send=error");
			exit();

		}


		
		

	}