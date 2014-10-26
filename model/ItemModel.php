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
			array_push($retArray, new Item($item['ID'], $item['NAME'], $item['URL']));
		}
		//var_dump($retArray);
		return $retArray;
	}
	
	public function getItemById($ID)
	{
		$item = $this->dbItem->getItemById($ID);
		return new \Model\Item($item[0]['ID'], $item[0]['NAME'], $item[0]['URL']);
	}
}
