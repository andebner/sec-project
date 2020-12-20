<?php

	if (isset($_POST['login-submit'])) {

		require 'dbconnection.php';

		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];


			$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pwd'";

			$result = mysqli_query($conn, $sql) or die(mysql_error());
			$rows = mysqli_num_rows($result);

			if($rows > 0) {

				session_start();

				$_SESSION['uName'] = $_POST['uname'];

				header("Location: ../main.php");
				exit();


			} else {

				header("Location: ../index.php?error=nouser");

				exit();

			}

	} else {

		header("Location: ../index.php");

		exit();

	}
