<?php

class CakeTablesView
{
	public static function show($tables)
	{
		$print = "";
		$print .= "================================================================\n";
		$print .= "TABLES\n";
		$print .= "----------------------------------------------------------------\n";
		foreach ($tables as $table) {
			$print .= "`" . $table->name . "`";
			$print .= "\n";
		}
		$print .= "================================================================\n";
		
		echo $print;
	}
}