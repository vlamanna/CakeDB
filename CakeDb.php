<?php

require('Controllers/load.php');
require('Models/load.php');
require('Views/load.php');

CakeDatabaseController::load();

while (true) {
	echo "> ";
	
	$command = fgets(STDIN);
	
	if (!CakeCommandController::parse($command)) {
		exit;
	}
}