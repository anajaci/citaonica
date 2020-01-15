<?php

	$server="localhost:3308";
	$user="root";
	$pwd="";
	$db="citaonica";

	$mysqli=new mysqli($server, $user, $pwd, $db);
	if ($mysqli->connect_errno) {
		echo "Greska";
	}

	$mysqli->set_charset("utf8");
?>