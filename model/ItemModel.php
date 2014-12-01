<?php
namespace Model;

class ItemModel
{
	private $dbItem;
	private $ID = "ID";
	private $name = "NAME";
	private $url = "URL";
	
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
			array_push($retArray, new Item($item[$this->ID], $item[$this->name], $item[$this->url]));
		}
		return $retArray;
	}
	
	public function getItemById($ID)
	{
		$item = $this->dbItem->getItemById($ID);
		return new \Model\Item($item[0][$this->ID], $item[0][$this->name], $item[0][$this->url]);
	}
}
