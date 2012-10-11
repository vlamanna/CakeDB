<?php

class CakeField
{
	private $name;
	private $type;
	
	public function __construct($name, $type)
	{
		$this->name = $name;
		$this->type = $type;
	}
	
	public function __get($name)
	{
		switch ($name) {
			case 'name':
			case 'type':
				break;
			default:
				return;
		}
		
		return $this->$name;
	}
	
	public function toArray()
	{
		return array('name' => $this->name, 'type' => $this->type);
	}
}