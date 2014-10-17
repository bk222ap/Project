<?php
namespace Model;

class ItemModel
{
	private $dbItem;
	
	public function __construct($dbconnect)
	{
			$this->dbItem = $dbconnect;
			
	}
	
	public function getItems()
	{
		$retArray = array();
		$itemArray = $this->dbItem->getItems();
		foreach ($itemArray as $item)
		{
			array_push($retArray, new Item($item['ID'], $item['NAME']));
		}
		//var_dump($retArray);
		return $retArray;
	}
	
	public function getItemById($ID)
	{
		return $this->dbItem->getItemById($ID);
	}
}
