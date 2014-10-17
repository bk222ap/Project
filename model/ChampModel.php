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
		//var_dump($retArray);
		return $retArray;
	}
	
	public function getBuildByChampID($id){
		$builds = $this->dbChampions->getBuildByChampID($id);
		$buildsList = array();
		foreach($builds as $b) {
			array_push($buildsList, new Build($b['ID'], $b['CHAMPID']));
		}
		return $buildsList;
	}
	
}
