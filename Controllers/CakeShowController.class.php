<?php

class CakeShowController
{
	public static function parse($command)
	{
		$command = explode(" ", $command);
		$action = array_shift($command);
		$command = implode(" ", $command);
		
		switch (strtolower($action)) {
			case "table":
				CakeTableController::show($command);
				break;
			case "tables":
				CakeTablesController::show($command);
				break;
			default:
				CakeErrorView::printError('Unkown Command.');
		}
	}
}