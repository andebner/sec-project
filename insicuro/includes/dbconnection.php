<?php

	$servername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "textmeinsicura";

	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

	if (!$conn) {

		die("Connection failed: ".msqli_connect_error());

	}

