<?php

class CakeTimer
{
	private $startTime;
	private $endTime;
	
	public function start()
	{
		$this->startTime = microtime(true);
	}
	
	public function end()
	{
		$this->endTime = microtime(true);
	}
	
	public function getTime()
	{
		return round(($this->endTime - $this->startTime) * 1000, 2);
	}
}