<?php

class CakeTableView
{
	public static function show($table)
	{
		$print = "";
		$print .= "================================================================\n";
		$print .= "TABLE `" . $table->name . "`\n";
		$print .= "----------------------------------------------------------------\n";
		foreach ($table->fields as $field) {
			$print .= "`" . $field->name . "` | " . $field->type;
			$print .= "\n";
		}
		$print .= "================================================================\n";
		
		echo $print;
	}
}