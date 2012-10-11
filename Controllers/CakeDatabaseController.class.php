<?php

class CakeDatabaseController
{
	public static function load()
	{
		$database = new CakeDatabase();
		$database->load();
	}
}