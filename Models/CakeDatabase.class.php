<?php

class CakeDatabase
{
	private static $instance;
	private $tables;
	
	public function __construct()
	{
		$this->tables = array();
		
		self::$instance = $this;
	}
	
	public function __get($name)
	{
		switch ($name) {
			case 'tables':
				break;
			default:
				return;
		}
		
		return $this->$name;
	}
	
	public static function getInstance()
	{
		return self::$instance;
	}
	
	public function load()
	{
		if (!file_exists("Data/db")) {
			$this->save();
		}
		
		$database = json_decode(file_get_contents("Data/db"));
		
		foreach ($database->{'tables'} as $table) {
			$this->tables[$table->{'name'}] = new CakeTable($table->{'name'});
			$this->tables[$table->{'name'}]->load($table->{'fields'});
		}
	}
	
	public function save()
	{
		$database = array();
		$database['tables'] = array();
		
		foreach ($this->tables as $name => $table) {
			$database['tables'][] = $table->toArray();
		}
		
		file_put_contents("Data/db", json_encode($database));
	}
	
	public function addTable($name)
	{
		if (isset($this->tables[$name])) {
			throw new Exception("Table already exists.", -1);
		}
		
		$this->tables[$name] = new CakeTable($name);
		
		return $this->tables[$name];
	}
	
	public function removeTable($name)
	{
		if (!isset($this->tables[$name])) {
			throw new Exception("Table doesn't exist.", -1);
		}
		
		unset($this->tables[$name]);
	}
	
	public function getTable($name)
	{
		if (!isset($this->tables[$name])) {
			throw new Exception("Table doesn't exist.", -1);
		}
		
		return $this->tables[$name];
	}
}