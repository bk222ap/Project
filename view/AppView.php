<?php
namespace View;

class AppView
{
	private $seeChampID ='SeeChampID';
	
	public function firstPagelol()
	{
		
		return"More stuff";
	}
	
	public function showChamps($ID,$Name)
	{
		return "<p> name =<a href='index.php?".$this->seeChampID."=".$ID."'>" .$Name."</a></p>";
	}
	
	public function showItems($ID,$Name)
	{
		return "<p> name =" .$Name."</p>";
	}
	
	public function buildBuildsList($build, $items)
	{

		return "<p> Build: ". $build->getID() . " Items: <a href='index.php?SeeItemID=" . $items[0]->getItemID() . "'>" . $items[0]->getItemName() . "</a>
														 <a href='index.php?SeeItemID=" . $items[1]->getItemID() . "'>" . $items[1]->getItemName() . "</a>
														 <a href='index.php?SeeItemID=" . $items[2]->getItemID() . "'>" . $items[2]->getItemName() . "</a>
														 <a href='index.php?SeeItemID=" . $items[3]->getItemID() . "'>" . $items[3]->getItemName() . "</a>
														 <a href='index.php?SeeItemID=" . $items[4]->getItemID() . "'>" . $items[4]->getItemName() . "</a>
														 <a href='index.php?SeeItemID=" . $items[5]->getItemID() . "'>" . $items[5]->getItemName() . "</a></p>";
	}
	
	//isset
	public function userWantsToSeeChamp()
	{
		return isset($_GET[$this->seeChampID]);	
	}
	//getters 
	public function getSeeChampID()
	{
	 	if ($this->userWantsToSeeChamp()) 
	 	{
			 return $_GET[$this->seeChampID];
		}
		
		else 
		{
			return -1;
		}
	}

}
