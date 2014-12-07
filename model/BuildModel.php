<?php
namespace Model;

class BuildModel
{
	private $dbBuild;
	private $completeID ="ID";
	private $buildID = "BuildID";
	private $itemID = "ItemID";
	private $champID ="CHAMPID";
	private $title = "titel";
	private $description = "description";
	private $abilityID = "ABILITYID";

	public function __construct($dbConnect)
	{
		$this->dbBuild = $dbConnect;
		
	}
		//fetches items in a build with ID
	public function getBuildItemsByID($id)
	{
		$builItems = $this->dbBuild->getBuildItemsByID($id);
		$items = array();
		array_push($items, $builItems[0][$this->itemID]);
		array_push($items, $builItems[1][$this->itemID]);
		array_push($items, $builItems[2][$this->itemID]);
		array_push($items, $builItems[3][$this->itemID]);
		array_push($items, $builItems[4][$this->itemID]);
		array_push($items, $builItems[5][$this->itemID]);
		return new BuildItem($builItems[0][$this->buildID], 
							$items);
	}

	public function addBuild($completeBuild)
	{
		$this->dbBuild->addBuild($completeBuild);
	}

	public function getCompleteBuildFromID($id)
	{
	 $spara = $this->dbBuild->getBuildByID($id);

	 return new \Model\Build($spara[0][$this->completeID],$spara[0][$this->champID],
	 						$spara[0][$this->title],$spara[0][$this->description]);
	}
		//fetches levelUps in a build with ID
	public function getLevelsByID($ID)
	{
		$arr = $this->dbBuild->getLevelsByID($ID);

		return new \Model\BuildLevels($arr[0][$this->abilityID], $arr[1][$this->abilityID],
									  $arr[2][$this->abilityID], $arr[3][$this->abilityID],
									  $arr[4][$this->abilityID], $arr[5][$this->abilityID],
									  $arr[6][$this->abilityID], $arr[7][$this->abilityID],
									  $arr[8][$this->abilityID], $arr[9][$this->abilityID],
									  $arr[10][$this->abilityID], $arr[11][$this->abilityID],
									  $arr[12][$this->abilityID], $arr[13][$this->abilityID],
									  $arr[14][$this->abilityID], $arr[15][$this->abilityID],
									  $arr[16][$this->abilityID], $arr[17][$this->abilityID]);
	}
	
}
