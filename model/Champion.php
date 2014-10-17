<?php
namespace Model;

class Champion
{
	
	private $champID;
	private $champName;
	
	public function __construct($ID,$NAME)
	{
		$this->champID = $ID;
		$this->champName = $NAME;
	}
	
	public function getChampName()
	{
		return $this->champName;
	}
	
	public function getChampID()
	{
		return $this->champID;
	}
}
