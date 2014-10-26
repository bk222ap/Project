<?php
namespace View;

class AppView
{
	private $seeChampID ='SeeChampID';

	private $seeBuildID ='SeeBuildID';

	private $seeItemID =  "SeeItemID";
	
	private $addNewBuild ='AddBuild';
	
	private $champID ='ChampID';
	
	private $numberOfItems =6;
	
	private $numberOfLevels = 18;
	
	private $numberOfSpells = 4;
	

	public function showChamps($ID,$Name)
	{
		return "<p><a href='index.php?".$this->seeChampID."=".$ID."'>" .$Name."</a></p>";
	}
	
	public function showItems($ID,$Name)
	{
		return "<p> name = " .$Name."</p>";
	}

	public function showItem($item)
	{
		return "<p> Name = " .$item->getItemName()."</p>
				<img src='" . $item->getURL() . "'/>";
	}

	public function showBuild($build, $items, $champ, $levels){
		$html = "";
		$html .= "<p>Champion: <a href='index.php?".$this->seeChampID."=".$champ->getChampID()."'>" . $champ->getChampName() . "</a></p>";
		$html .= "<H3>" . $build->getTitle() . "</H3>";
		$html .= "<p>" . $build->getDescription() . "</p>";
		$html .= "<a href='index.php?" . $this->seeItemID . "=" . $items[1]->getItemID() . "'>" . $items[1]->getItemName() . "</a>
				 <a href='index.php?" . $this->seeItemID . "=" . $items[2]->getItemID() . "'>" . $items[2]->getItemName() . "</a>
				 <a href='index.php?" . $this->seeItemID . "=" . $items[3]->getItemID() . "'>" . $items[3]->getItemName() . "</a>
				 <a href='index.php?" . $this->seeItemID . "=" . $items[4]->getItemID() . "'>" . $items[4]->getItemName() . "</a>
				 <a href='index.php?" . $this->seeItemID . "=" . $items[5]->getItemID() . "'>" . $items[5]->getItemName() . "</a></p>";
		$html .= "<p> Levels </p>";

		for($i = 0; $i < $this->numberOfSpells; $i++){
			switch ($i) {
				case 0:	
					$html .= "Q:";				
					break;
				case 1:
					$html .= "W:";						
					break;
				case 2:
					$html .= "E:";						
					break;
				case 3:
					$html .= "R:";						
					break;
			}
			
			for($j = 0; $j < $this->numberOfLevels; $j++){
				$html .= "<input type='radio' disabled='true' name='radio" . $j ."' value='". $i ."'   ";
				if($i == $levels->getl($j)){
					$html .= "checked";
				}					
				$html .=  " />";
			}
			$html .= "<br>";
		}

		return $html;

	}
	
	public function buildBuildsList($build, $items)
	{

		return "<p><a href='index.php?" . $this->seeBuildID . "=" . $build->getID()  . 
				"'> Build:". $build->getID() . "</a> Items: 
				 <a href='index.php?SeeItemID=" . $items[0]->getItemID() . "'><img src='" . $items[0]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[1]->getItemID() . "'><img src='" . $items[1]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[2]->getItemID() . "'><img src='" . $items[2]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[3]->getItemID() . "'><img src='" . $items[3]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[4]->getItemID() . "'><img src='" . $items[4]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[5]->getItemID() . "'><img src='" . $items[5]->getURL() ."'></a></p>";
	}

	public function getAddBuildHTML()
	{
		return "<p><a href='index.php?".$this->addNewBuild."'> Add New Build tiihii </a> </p>";
	}

	public function getCreateBuild($items,$champs)
	{

		$html ="";
		$html .= "<form action='index.php?" . $this->addNewBuild . "' method='post'>";	
		$html .= "Champion: ";
		$html .= "<select name='".$this->champID."'>";
		foreach($champs as $champ){
			$html .= "<option value='" . $champ->getChampID() ."'>" . $champ->getChampName() ."</option> ";
		}
		$html .= "</select>";

		// Create all select with all options
		$html .= "<br>";
		for($i = 0; $i < $this->numberOfItems; $i++){
			$html .= "Item: " . ($i + 1);
			$html .= " <select name='item". ($i + 1) . "'>";
			foreach($items as $item){
				$html .= "<option value='" . $item->getItemID() ."'>" . $item->getItemName() ."</option> ";
			}
			$html .= "</select><br> ";

			
		}
		
		$html .= "Titel: <br> <input type='text' name='titel'> <br>";
		$html .= "Add Description here:<br> <textarea name='description' rows='10' cols='80'></textarea>";
		$html .= "<p><input type='submit' value='Create Build' /></p>";
		$html .= $this->getAbilityLevels();
		$html .= "</form>";
		return $html;
	}

		public function getAbilityLevels()
	{
		$html ="";
		for($i = 0; $i < $this->numberOfSpells; $i++){
			switch ($i) {
				case 0:	
					$html .= "Q:";				
					break;
				case 1:
					$html .= "W:";						
					break;
				case 2:
					$html .= "E:";						
					break;
				case 3:
					$html .= "R:";						
					break;
			}
			
			for($j = 0; $j < $this->numberOfLevels; $j++){
				$html .= "<input type='radio' name='radio" . $j ."' value='". $i ."'   ";
				if(isset($_POST['radio' . $i]) && isset($_POST['radio' . $j])){
					if($_POST['radio' . $j] == $i){
						$html .= "checked";
					}					
				}
				$html .=  " />";
			}
			$html .= "<br>";
		}
		
		if($this->validateLevels()){
			for($i = 0; $i < $this->numberOfLevels; $i++){
				$html .= "<br>Level: " . ($i + 1) . " ability: " . $_POST['radio' . $i];
			}
		}
		else{
			$html .= "Errors in level distrubution, need 1 ability in each level!";
		}
		
		return $html;
	}


	public function locationToAddedBuild(){
		header("Location: index.php?" . $this->seeChampID  . "=" . $_POST[$this->champID]);
		die();
	}

	//isset
	public function validateLevels()
	{
		$ok = true;
		for($i = 0; $i < $this->numberOfLevels; $i++){
			if(!isset($_POST['radio' . $i])){
				$ok = false;
			}
		}
		return $ok;
	}

	public function userWantsToAddBuild()
	{
		return isset($_GET[$this->addNewBuild]);	
	}

	public function userHavePostedBuild()
	{
		return isset($_POST[$this->champID]);	
	}

	public function userWantsToSeeChamp()
	{
		return isset($_GET[$this->seeChampID]);	
	}

	public function userWantsToSeeItem()
	{
		return isset($_GET[$this->seeItemID]);	
	}

	public function userWantsToSeeBuild()
	{
		return isset($_GET[$this->seeBuildID]);	
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

	public function getSeeBuildID()
	{
	 	if ($this->userWantsToSeeBuild()) 
	 	{
			 return $_GET[$this->seeBuildID];
		}
		
		else 
		{
			return -1;
		}
	}

	public function getSeeItemID()
	{
	 	if ($this->userWantsToSeeItem()) 
	 	{
			 return $_GET[$this->seeItemID];
		}
		
		else 
		{
			return -1;
		}
	}
	public function getNewBuildPosted()
	{
		return new \Model\CompleteBuild($_POST[$this->champID], $_POST['item1'], $_POST['item2'],$_POST['item3'],
															   $_POST['item4'], $_POST['item5'], $_POST['item6'], $_POST['titel'], $_POST['description'],
															   $_POST['radio0'],$_POST['radio1'],$_POST['radio2'],$_POST['radio3'],$_POST['radio4'],$_POST['radio5'],
															   $_POST['radio6'],$_POST['radio7'],$_POST['radio8'],$_POST['radio9'],$_POST['radio10'],$_POST['radio11'],
															   $_POST['radio12'],$_POST['radio13'],$_POST['radio14'],$_POST['radio15'],$_POST['radio16'],$_POST['radio17']);
	}


}
