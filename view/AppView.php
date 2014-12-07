<?php
namespace View;

class AppView
{
	private $seeChampID ='SeeChampID';
	private $seeBuildID ='SeeBuildID';
	private $seeItemID =  "SeeItemID";
	private $userIDString = "userID";
	private $title = "titel";
	private $radio = "radio";
	private $item = "item";
	private $description = "description";
	private $addNewBuild ='AddBuild';
	private $addCommentOnBuild = "AddCommentOnBuild";
	private $commentString = "comment";
	private $champID ='ChampID';
	private $numberOfItems =6;
	private $numberOfLevels = 18;
	private $numberOfSpells = 4;
	
	//radio buttons POST names and Items 
	private $radio0 = "radio0";
	private $radio1 = "radio1";
	private $radio2 = "radio2";
	private $radio3 = "radio3";
	private $radio4 = "radio4";
	private $radio5 = "radio5";
	private $radio6 = "radio6";
	private $radio7 = "radio7";
	private $radio8 = "radio8";
	private $radio9 = "radio9";
	private $radio10 = "radio10";
	private $radio11 = "radio11";
	private $radio12 = "radio12";
	private $radio13 = "radio13";
	private $radio14 = "radio14";
	private $radio15 = "radio15";
	private $radio16 = "radio16";
	private $radio17 = "radio17";
	private $item1 = "item1";
	private $item2 = "item2";
	private $item3 = "item3";
	private $item4 = "item4";
	private $item5 = "item5";
	private $item6 = "item6";
	

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

	public function showBuild($build, $items, $champ, $levels)
	{
		$html = "";
		$html .= "<p>Champion: <a href='index.php?".$this->seeChampID."=".$champ->getChampID()."'>" . $champ->getChampName() . "</a></p>";
		$html .= "<H3>" . $build->getTitle() . "</H3>";
		$html .= "<p>" . $build->getDescription() . "</p>";
		$html .= "<a href='index.php?" .  $this->seeItemID . "=" . $items[0]->getItemID() . "'><img src='" . $items[0]->getURL() ."'></a>
				 <a href='index.php?" .  $this->seeItemID . "=" . $items[1]->getItemID() . "'><img src='" . $items[1]->getURL() ."'></a>
				 <a href='index.php?" .  $this->seeItemID . "=" . $items[2]->getItemID() . "'><img src='" . $items[2]->getURL() ."'></a>
				 <a href='index.php?" .  $this->seeItemID . "=" . $items[3]->getItemID() . "'><img src='" . $items[3]->getURL() ."'></a>
				 <a href='index.php?" .  $this->seeItemID . "=" . $items[4]->getItemID() . "'><img src='" . $items[4]->getURL() ."'></a>
				 <a href='index.php?" .  $this->seeItemID . "=" . $items[5]->getItemID() . "'><img src='" . $items[5]->getURL() ."'></a></p>";
		$html .= "<p> Levels </p>";

		for($i = 0; $i < $this->numberOfSpells; $i++)
		{
			switch ($i)
			{
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
			
			for($j = 0; $j < $this->numberOfLevels; $j++)
			{
				$html .= "<input type='radio' disabled='true' name='radio" . $j ."' value='". $i ."'   ";
				if($i == $levels->getl($j))
				{
					$html .= "checked";
				}					
				$html .=  " />";
			}
			$html .= "<br>";
		}

		return $html;

	}
		// A certain builds buildList
	public function buildBuildsList($build, $items)
	{
		return "<p><div><a href='index.php?" . $this->seeBuildID . "=" . $build->getID()  . 
				"'> Build:". $build->getTitle() . "</a></div> Items: 
				 <a href='index.php?SeeItemID=" . $items[0]->getItemID() . "'><img src='" . $items[0]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[1]->getItemID() . "'><img src='" . $items[1]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[2]->getItemID() . "'><img src='" . $items[2]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[3]->getItemID() . "'><img src='" . $items[3]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[4]->getItemID() . "'><img src='" . $items[4]->getURL() ."'></a>
				 <a href='index.php?SeeItemID=" . $items[5]->getItemID() . "'><img src='" . $items[5]->getURL() ."'></a></p>";
	}

	public function getAddBuildHTML()
	{
		return "<p><a href='index.php?".$this->addNewBuild."'> Add New Build tiihii </a></p>";
	
	}

	public function getBuildsHeader($champName){
		return "<h2>Builds for: " . $champName . "</h2>";
	}

	public function getCreateBuild($items,$champs)
	{

		$html ="";
		$html .= "<form action='index.php?" . $this->addNewBuild . "' method='post'>";	
		$html .= "Champion: ";
		$html .= "<select name='".$this->champID."'>";
		foreach($champs as $champ)
		{
			$html .= "<option value='" . $champ->getChampID() ."'>" . $champ->getChampName() ."</option> ";
		}
		$html .= "</select>";

		// Create all select with all options
		$html .= "<br>";
		for($i = 0; $i < $this->numberOfItems; $i++)
		{
			$html .= "Item: " . ($i + 1);
			$html .= " <select name='item". ($i + 1) . "'>";
			foreach($items as $item)
			{
				$html .= "<option value='" . $item->getItemID() ."'>" . $item->getItemName() ."</option>";
			}
			$html .= "</select><br> ";

			
		}
		
		$html .= $this->getAbilityLevels();
		$html .= "<br> Title: <br> <input type='text' name='titel'> <br>";
		$html .= "<br>Add Description here:<br> <textarea name='description' rows='10' cols='80'></textarea>";
		$html .= "<p><input type='submit' value='Create Build' /></p>";
		$html .= "</form>";
		return $html;
	}

		public function getAbilityLevels()
	{
		$html ="";
		for($i = 0; $i < $this->numberOfSpells; $i++)
		{
			switch ($i) 
			{
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
			
			for($j = 0; $j < $this->numberOfLevels; $j++)
			{
				$html .= "<input type='radio' name='radio" . $j ."' value='". $i ."'   ";
				if(isset($_POST[$this->radio . $i]) && isset($_POST[$this->radio . $j]))
				{
					if($_POST[$this->radio . $j] == $i)
					{
						$html .= "checked";
					}					
				}
				$html .=  " />";
			}
			$html .= "<br>";
		}
		
		if($this->validateAdd())
		{
			for($i = 0; $i < $this->numberOfLevels; $i++)
			{
				$html .= "<br>Level: " . ($i + 1) . " ability: " . $_POST[$this->radio . $i];
			}
		}
		else
		{
			$html .= "You Need to place a point on every level! <br>";
		}
		
		return $html;
	}

	public function showComment($c)
	{
		return "
			<p>Comment: " . $c[$this->commentString] . "</p>
			";

	}

	/**
	 * @return HTML for writing a comment
	 */
	public function showAddNewComment()
	{
		$html = "
			<p> What do you think? </p>
			<form action='index.php?". $this->seeBuildID . "=" 
												  . $_GET[$this->seeBuildID] . 
												  "&" . $this->addCommentOnBuild . 
												  "=" . $_GET[$this->seeBuildID] . "' method='post'>
				<label>Comment</label><br>
				<textarea name='". $this->commentString . "' rows='4' cols='50'>
				</textarea><br>
				<button class='.button-link' type='submit'>Comment</button>
			</form>		
		";
		
		return $html;
	}

	public function userWantsToAddAComment()
	{
		return isset($_POST[$this->commentString]);
	}

	public function getIndexLink()
	{
		return "<p><a href='index.php' class='notTheSameAsTheOthers'>Back</a></p>";
	}

	public function getPostedComment()
	{
		return $_POST[$this->commentString];
	}

	public function locationToAddedBuild()
	{
		header("Location: index.php?" . $this->seeChampID  . "=" . $_POST[$this->champID]);
		die();
	}

	//isset
	public function validateAdd()
	{
		$ok = true;
		for($i = 0; $i < $this->numberOfLevels; $i++)
		{
			if(!isset($_POST[$this->radio . $i]))
			{
				$ok = false;
			}
		}
		if(!isset($_POST[$this->title]))
		{
			$ok = false;
		}
		if(!isset($_POST[$this->description]))
		{
			$ok = false;
		}
		return $ok;
	}

	public function getButtons()
	{
		$buttons = array();
		for($i = 0; $i < $this->numberOfLevels; $i++)
		{
			if(isset($_POST[$this->radio . $i]))
			{
				array_push($buttons, $_POST[$this->radio . $i]);
			}
		}
		return $buttons;
	}

	public function getItems()
	{
		$items = array();
		for($i = 1; $i <= $this->numberOfItems; $i++)
		{
			$count = 0;
			if(isset($_POST[$this->item . $i]))
			{	$count++;
				array_push($items, $_POST[$this->item . $i]);
			}
			else{
				throw new \Exception("item was not set " . $count);
			}
		}
		return $items;
	}

	public function getTitle()
	{
		return $_POST[$this->title];
	}

	public function getDesc()
	{
		return $_POST[$this->description];
	}

	public function getUserIDString()
	{
	 	return $this->userIDString;
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
	// returns all information to have in a build(items,title, description and LevelsUps,)
	public function getNewBuildPosted()
	{
		return new \Model\CompleteBuild($_POST[$this->champID], $this->getItems(), 
															   $_POST[$this->title], $_POST[$this->description],
															  	$this->getButtons());
	}

	private $errors = array();
	private $successes = array();

	public function hasErrors()
	{
		return count($this->errors) > 0;
	}

	public function hasSuccesses()
	{
		return count($this->successes) > 0;
	}



	// ERROR AND SUCCESS MESSAGES BELLOW!
	
	public function getErrorHTML()
	{

		$html = "<div id='errors'>";
		foreach ($this->errors as $error)
		{
			$html .= "<p>" . $error . "</p>";
		}
		$html .= "</div>";
		return $html;
	}

	public function getSuccessHTML()
	{
		
		$html = "<div id='successes'>";
		foreach ($this->successes as $success)
		{
			$html .= "<p>" . $success . "</p>";
		}
		$html .= "</div>";
		return $html;
	}

	public function addBuildSuccessMessage()
	{
		array_push($this->successes,"Build was added successfully");
	}

	public function addCommentSuccessMessage()
	{
		array_push($this->successes,"Comment was added successfully");
	}

	public function titleMissingErrorMessage()
	{
		array_push($this->errors,"The Title was missing");
	}

	public function levelsMissingErrorMessage()
	{
		array_push($this->errors,"Levels not filled");
	}

	public function noBuildsFoundError()
	{
		array_push($this->errors,"No builds found");
	}

	public function noCommentErrorMessage()
	{
		array_push($this->errors,"Enter a comment to comment");
	}

	public function addBuildError()
	{
		array_push($this->errors,"Error adding build, fill all the info");
	}

	public function registerCompleteSuccessMessage()
	{
		array_push($this->successes,"Register Complete <a href='index.php'>click me</a>");
	}

	public function registerFailErrorMessage()
	{
		array_push($this->errors,"Fill in both username AND password");
	}

	public function usernameAlreadyExistsErrorMessage()
	{
		array_push($this->errors,"Username already exists");
	}
	
}
