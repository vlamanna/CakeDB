<?php

class CakeTablesController
{
	public static function show()
	{
		try {
			$database = CakeDatabase::getInstance();
			
			$tables = $database->tables;
		} catch (Exception $e) {
			CakeErrorView::printError($e->getMessage());
			return;
		}
		
		CakeTablesView::show($tables);
	}
}