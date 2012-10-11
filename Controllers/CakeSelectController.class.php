<?php

class CakeSelectController
{
	public static function parse($command)
	{
		$command = explode("FROM", $command);
		
		if (sizeof($command) != 2) {
			CakeErrorView::printError('Unkown Command.');
			return;
		}
		
		$fields = $command[0];
		$fields = explode(",", $fields);
		$tableName = trim($command[1]);
		
		CakeTableController::select($tableName, $fields);
	}
}