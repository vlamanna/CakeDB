<?php

class CakeDeleteController
{
	public static function parse($command)
	{
		$command = explode(" ", $command);
		$action = array_shift($command);
		$command = implode(" ", $command);
		
		switch (strtolower($action)) {
			case "table":
				CakeTableController::delete($command);
				break;
			default:
				CakeErrorView::printError('Unkown Command.');
		}
	}
}