<?php
namespace Model;

class BuildModel
{
	private $dbBuild;
	public function __construct($dbConnect)
	{
		$this->dbBuild = $dbConnect;
		
	}
	
	public function getBuildByID($id)
	{
		$retArray = array();
		$builItems = $this->dbBuild->getBuildByID($id);
		return new BuildItem($builItems[0]['BuildID'], $builItems[0]['ItemID'],  $builItems[1]['ItemID'],  $builItems[2]['ItemID'],  $builItems[3]['ItemID'],  $builItems[4]['ItemID'],  $builItems[5]['ItemID']);
	}
	
}
