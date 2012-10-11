<?php

class CakeFieldController
{
	public static function parse($column)
	{
		$column = explode(" ", $column);
		
		if (sizeof($column) < 3) {
			CakeErrorView::printError('Unkown Command.');
			return;
		}
		
		$name = str_replace("`", "", $column[0]);
		$as = $column[1];
		$type = $column[2];
		
		if ($as != "AS") {
			CakeErrorView::printError('Unkown Command.');
			return;
		}
		
		switch ($type) {
			case "INT":
			case "STRING":
				break;
			default:
				CakeErrorView::printError('Unkown Command.');
				return;
		}
		
		return array('name' => $name, 'type' => $type);
	}
}