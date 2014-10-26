<?php
namespace Model;

class BuildModel
{
	private $dbBuild;
	public function __construct($dbConnect)
	{
		$this->dbBuild = $dbConnect;
		
	}
	
	public function getBuildItemsByID($id)
	{
		$retArray = array();
		$builItems = $this->dbBuild->getBuildItemsByID($id);
		return new BuildItem($builItems[0]['BuildID'], $builItems[0]['ItemID'],  $builItems[1]['ItemID'],  $builItems[2]['ItemID'],  $builItems[3]['ItemID'],  $builItems[4]['ItemID'],  $builItems[5]['ItemID']);
	}

	public function addBuild($completeBuild){
		$this->dbBuild->addBuild($completeBuild);
	}

	public function getCompleteBuildFromID($id){

	 $spara= $this->dbBuild->getBuildByID($id);

	 return new \Model\Build($spara[0]['ID'],$spara[0]['CHAMPID'],$spara[0]['titel'],$spara[0]['description']);
	}

	public function getLevelsByID($ID){
		$arr = $this->dbBuild->getLevelsByID($ID);
		return new \Model\BuildLevels($arr[0]['ABILITYID'], $arr[1]['ABILITYID'],$arr[2]['ABILITYID'],$arr[3]['ABILITYID'],$arr[4]['ABILITYID'],$arr[5]['ABILITYID'],
			$arr[6]['ABILITYID'],$arr[7]['ABILITYID'],$arr[8]['ABILITYID'],$arr[9]['ABILITYID'],$arr[10]['ABILITYID'],$arr[11]['ABILITYID'],
			$arr[12]['ABILITYID'],$arr[13]['ABILITYID'],$arr[14]['ABILITYID'],$arr[15]['ABILITYID'],$arr[16]['ABILITYID'],$arr[17]['ABILITYID']);
	}
	
}
