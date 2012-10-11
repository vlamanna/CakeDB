<?php

class CakeCommandController
{
	public static function parse($command)
	{
		$timer = new CakeTimer();
		$timer->start();
		
		$command = substr($command, 0, -1);
		$command = explode(" ", $command);
		$action = array_shift($command);
		$command = implode(" ", $command);
		
		switch (strtolower($action)) {
			case "exit":
				return false;
				break;
			case "show":
				CakeShowController::parse($command);
				break;
			case "create":
				CakeCreateController::parse($command);
				break;
			case "drop":
				CakeDeleteController::parse($command);
				break;
			case "select":
				CakeSelectController::parse($command);
				break;
			default:
				CakeErrorView::printError('Unkown Command.');
		}
		
		$timer->end();
		
		CakeNotifyView::notify("Command executed in " . $timer->getTime() . " ms.");
		
		return true;
	}
}