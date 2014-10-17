<?php
namespace Model;

class Item
{
	
	private $itemID;
	private $itemName;
	
	public function __construct($ID,$NAME)
	{
		$this->itemID = $ID;
		$this->itemName = $NAME;
	}
	
	public function getItemName()
	{
		return $this->itemName;
	}
	
	public function getItemID()
	{
		return $this->itemID;
	}
	
}
