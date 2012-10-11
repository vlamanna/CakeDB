<?php

class CakeFieldsController
{
	public static function parse($command)
	{
		$fields = array();
		
		$columns = explode(",", $command);
		foreach ($columns as $column) {
			$fields[] = CakeFieldController::parse(trim($column));
		}
		
		return $fields;
	}
}