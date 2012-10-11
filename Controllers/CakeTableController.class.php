<?php

class CakeTableController
{		
	public static function show($command)
	{
		$command = explode(" ", $command);
		$tableName = str_replace("`", "", array_shift($command));
		
		if (sizeof($command) != 0) {
			CakeErrorView::printError('Unkown Command.');
			return;
		}
		
		try {
			$database = CakeDatabase::getInstance();
			
			$table = $database->getTable($tableName);
		} catch (Exception $e) {
			CakeErrorView::printError($e->getMessage());
			return;
		}
		
		CakeTableView::show($table);
	}
	
	public static function create($command)
	{
		$command = explode(" ", $command);
		$tableName = str_replace("`", "", array_shift($command));
		$command = implode(" ", $command);
		
		$fields = CakeFieldsController::parse($command);
		
		try {
			$database = CakeDatabase::getInstance();
			
			$table = $database->addTable($tableName);
			
			foreach ($fields as $field) {	
				$table->addField($field['name'], $field['type']);
			}
			
			$table->save();
			$database->save();
		} catch (Exception $e) {
			CakeErrorView::printError($e->getMessage());
			return;
		}
	}
	
	public static function delete($command)
	{
		$command = explode(" ", $command);
		$tableName = str_replace("`", "", array_shift($command));
		
		if (sizeof($command) != 0) {
			CakeErrorView::printError('Unkown Command.');
			return;
		}
		
		try {
			$database = CakeDatabase::getInstance();
			
			$table = $database->removeTable($tableName);
			
			$database->save();
		} catch (Exception $e) {
			CakeErrorView::printError($e->getMessage());
			return;
		}
	}
	
	public static function select($tableName, $fields)
	{
		if (sizeof($fields) == 0) {
			CakeErrorView::printError('Unkown Command.');
			return;
		}
		
		try {
			$database = CakeDatabase::getInstance();
			
			$table = $database->getTable($tableName);
			
			if (trim($fields[0]) == "*") {
				if (sizeof($fields) > 1) {
					CakeErrorView::printError('Unkown Command.');
					return;
				}
			} else {
				foreach ($fields as $field) {
					$field = trim($field);
					
					if ($field == "*") {
						CakeErrorView::printError('Unkown Command.');
						return;
					}
					
					$field = $table->getField($field);
				}
			}
		} catch (Exception $e) {
			CakeErrorView::printError($e->getMessage());
			return;
		}
	}
}