<?php

	error_reporting(E_ALL);
	$dbc = new mysqli('localhost', 'root', 'qwerty123', 'first_project');
	
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	
