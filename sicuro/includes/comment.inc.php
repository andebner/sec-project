<?php

	session_start();

	if (isset($_POST['send-comment'])) {

		require 'dbconnection.php';

		$user = $_SESSION['uName'];
		$cmt = htmlspecialchars($_POST['cmttext']);
		$msg = $_POST['mid'];

		if (preg_match("/^[a-zA-Z0-9]*$/", $cmt)) {

			$sql = "INSERT INTO comments (mid, user, comment) VALUES ('$msg', '$user', '$cmt')";

			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {

				header("Location: ../main.php?cmt=error");
				exit();

			} else {

				mysqli_stmt_execute($stmt);
				
				header("Location: ../comments.php?mid=".$msg."");

				exit();

			}


		} else {

			header("Location: ../main.php?cmt=error");
			exit();

		}



		
		

	}