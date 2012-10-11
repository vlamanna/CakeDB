<?php

class CakeTable
{
	private $name;
	private $fields;
	
	public function __construct($name)
	{
		$this->name = $name;
		$this->fields = array();
	}
	
	public function __get($name)
	{
		switch ($name) {
			case 'name':
			case 'fields':
				break;
			default:
				return;
		}
		
		return $this->$name;
	}
	
	public function toArray()
	{
		$fields = array();
		
		foreach ($this->fields as $field) {
			$fields[] = $field->toArray();
		}
		
		return array('name' => $this->name, 'fields' => $fields);
	}
	
	public function load($fields)
	{
		foreach ($fields as $field) {
			$this->fields[$field->{'name'}] = new CakeField($field->{'name'}, $field->{'type'});
		}
	}
	
	public function save()
	{
		file_put_contents("Data/" . $this->name . "_data", "");
	}
	
	public function addField($name, $type)
	{
		if (isset($this->fields[$name])) {
			throw new Exception("Field already exists.", -1);
		}
		
		$this->fields[$name] = new CakeField($name, $type);
	}
	
	public function getField($name)
	{
		if (!isset($this->fields[$name])) {
			throw new Exception("Field doesn't exist.", -1);
		}
		
		return $this->fields[$name];
	}
}