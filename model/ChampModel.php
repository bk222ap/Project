<?php
namespace Model;

class ChampModel
{
	private $dbChampions;
	
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
			array_push($retArray, new Champion($champ['ID'], $champ['NAME']));
		}
		return $retArray;
	}

	public function getChampByID($id)
	{
		$retArray = array();
		$champArray = $this->dbChampions->getChampByID($id);
		return new Champion($champArray[0]['ID'], $champArray[0]['NAME']);

	}
	
	public function getBuildByChampID($id){
		$builds = $this->dbChampions->getBuildByChampID($id);
		$buildsList = array();
		foreach($builds as $b) {
			array_push($buildsList, new Build($b['ID'], $b['CHAMPID'],$b['titel'],$b['description']));
		}
		return $buildsList;
	}
	
}
