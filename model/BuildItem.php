<?php

namespace Model;

class BuildItem{

	private $itemArray = array();	
	
	public function __construct($ID, $items)
	{
		$this->id = $ID;
		foreach($items as $item){
			array_push($this->itemArray, $item);
		}	
	}
	
	public function getID()
	{
		return $this->id;
	}
	
	public function getItem($index)
	{
		return $this->itemArray[$index];
	}
}
