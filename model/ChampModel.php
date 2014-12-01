<?php
namespace Model;

class ChampModel
{
	private $dbChampions;
	private $ID = "ID";
	private $name = "NAME";
	private $champID = "CHAMPID";
	private $titel = "titel";
	private $description = "description";

	
	public function __construct($dbConnect)
	{
			$this->dbChampions = $dbConnect;
			
	}
	public function getChamps()
	{
		$retArray = array();
		$champArray = $this->dbChampions->getChamps();
		foreach ($champArray as $champ)
		{
			array_push($retArray, new Champion($champ[$this->ID], $champ[$this->name]));
		}
		return $retArray;
	}

	public function getChampByID($id)
	{
		$retArray = array();
		$champArray = $this->dbChampions->getChampByID($id);
		return new Champion($champArray[0][$this->ID], $champArray[0][$this->name]);

	}
	
	public function getBuildByChampID($id)
	{
		$builds = $this->dbChampions->getBuildByChampID($id);
		$buildsList = array();
		foreach($builds as $b) 
		{
			array_push($buildsList, new Build($b[$this->ID], $b[$this->champID],$b[$this->titel],$b[$this->description]));
		}
		return $buildsList;
	}
	
}
