<?php
namespace Model;

class Item
{
	
	private $itemID;
	private $itemName;
	private $URL;
	
	public function __construct($ID,$NAME, $URL)
	{
		$this->itemID = $ID;
		$this->itemName = $NAME;
		$this->URL = $URL;
	}
	
	public function getItemName()
	{
		return $this->itemName;
	}
	
	public function getItemID()
	{
		return $this->itemID;
	}
	
	public function getURL(){
		return $this->URL;
	}
}
