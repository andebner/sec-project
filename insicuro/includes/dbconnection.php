<?php

	$servername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "textme";

	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

	if (!$conn) {

		die("Connection failed: ".msqli_connect_error());

	}

