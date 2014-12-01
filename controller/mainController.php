<?php
namespace Controller;

require_once "./db/DBconnect.php";
require_once "./view/HTMLView.php";
require_once "./view/AppView.php";
require_once "./model/ChampModel.php";
require_once "./model/BuildModel.php";
require_once "./model/ItemModel.php";
require_once "./model/Champion.php";
require_once "./model/BuildItem.php";
require_once "./model/BuildLevels.php";
require_once "./model/CompleteBuild.php";
require_once "./model/Item.php";
require_once "./model/Build.php";
require_once "./model/User.php";
require_once "LoginController.php";
require_once "CommentController.php";
require_once("./model/LoginModel.php");
require_once "./view/LoginView.php";

class mainController
{
	private $html;
	private $appView;
	private $LoginView;
	private $htmlBody;
	private $champModel;
	private $itemModel;
	private $dbConnection;
	private $buildModel;
	private $loginController;
	private $commentController;
	private $LoginModel;
	
	public function __construct()
	{
		$this->dbConnection = new\db\connectDB();
		$this->itemModel = new\Model\ItemModel($this->dbConnection);
		$this->champModel = new\Model\ChampModel($this->dbConnection);
		$this->buildModel = new\Model\BuildModel($this->dbConnection);
        $this->LoginView = new\view\LoginView();
		$this->appView = new\View\AppView();
		$this->loginController = new \controller\LoginController($this->dbConnection, $this->LoginView);
		$this->commentController = new \controller\CommentController();
		$this->html = new \View\HTMLView();
		$this->htmlBody = "";
		
	}
	
	public function startApp()
	{
		// Handle Login			
		$this->loginController->CheckLoginEvents();

		$loggedIn = $this->loginController->IsUserLoggedIn();
		//user wants to see a champ  
		if ($this->appView->userWantsToSeeChamp()) 
		{
			//get champ ID.
			$id = $this->appView->getSeeChampID();
			
			//validate
			if (is_numeric($id) && $id != -1) 
			{
				$builds = $this->champModel->getBuildByChampID($id);
				if(count($builds)==0)
				{
					$this->appView->noBuildsFoundError();
				}
				foreach ($builds as $build) 
				{
					$buildItems = $this->buildModel->getBuildItemsByID($build->getID());
					$items = array();
					
					$item = $this->itemModel->getItemById($buildItems->getI1());
					array_push($items,$item);
					$item = $this->itemModel->getItemById($buildItems->getI2());
					array_push($items,$item);
					$item = $this->itemModel->getItemById($buildItems->getI3());
					array_push($items,$item);
					$item = $this->itemModel->getItemById($buildItems->getI4());
					array_push($items,$item);
					$item = $this->itemModel->getItemById($buildItems->getI5());
					array_push($items,$item);
					$item = $this->itemModel->getItemById($buildItems->getI6());
					array_push($items,$item);
						
					
					$this->htmlBody.=$this->appView->buildBuildsList($build, $items);
				}

			}
			$this->htmlBody .= $this->appView->getIndexLink();
		}

		else if ($this->appView->userWantsToAddBuild() && $loggedIn) 
		{
			// if it isnt already posted
			if ($this->appView->userHavePostedBuild()) 
			{
				if($this->appView->validateAdd())
				{
					$title = $this->appView->getTitle();
					$desc = $this->appView->getDesc();
					$button = $this->appView->getButtons();

					if(count($button) == 18){

					}
					if(strlen($title) > 0){

					}
					if(strlen($desc) > 0){

					}
				}
				if ($this->appView->validateAdd()) 
				{
					$completeBuild = $this->appView->getNewBuildPosted();
					$this->buildModel->addBuild($completeBuild);
					$this->appView->locationToAddedBuild();
				}
				else
				{
					$this->appView->addBuildError();
				}
				
			}
			// annars
			$items = $this->itemModel->getItems();
			
			$champs = $this->champModel->getChamps();

			$this->htmlBody .= $this->appView->getCreateBuild($items, $champs);

			$this->htmlBody .= $this->appView->getIndexLink();
		}
		// If user pressed a certain build
		else if($this->appView->userWantsToSeeBuild())
		{

				if($this->appView->userWantsToAddAComment())
				{
					$comment = $this->appView->getPostedComment();
					if(strlen(trim($comment))>0)
					{
						$buildId = $this->appView->getSeeBuildID();
						$userId = $this->loginController->GetLoggedInUser()->GetID();
						$this->commentController->addComment($buildId, $userId, $comment, $this->dbConnection);
					}
					else
					{
						$this->appView->noCommentErrorMessage();
					}
				}


			$ID  = $this->appView->getSeeBuildID();
			$builds = $this->dbConnection->getbuildbyid($ID);

			// if there are any builds show them. Else there arent any.
			if(count($builds)>0)
			{
				$Build = $this->buildModel->getCompleteBuildFromID($ID);
				$buildItems = $this->buildModel->getBuildItemsByID($ID);
				$levels = $this->buildModel->getLevelsByID($ID);

				$items = array();
				$item = $this->itemModel->getItemById($buildItems->getI1());
				array_push($items, $item);
				$item = $this->itemModel->getItemById($buildItems->getI2());
				array_push($items, $item);
				$item = $this->itemModel->getItemById($buildItems->getI3());
				array_push($items, $item);
				$item = $this->itemModel->getItemById($buildItems->getI4());
				array_push($items, $item);
				$item = $this->itemModel->getItemById($buildItems->getI5());
				array_push($items, $item);
				$item = $this->itemModel->getItemById($buildItems->getI6());
				array_push($items, $item);

				$champ = $this->champModel->getChampByID($Build->getChampID());

				$this->htmlBody .= $this->appView->showBuild($Build, $items, $champ, $levels);
				$comments = $this->commentController->getAllCommentsForID($ID, $this->dbConnection);
				foreach ($comments as $c) 
				{
					$this->htmlBody .= $this->appView->showComment($c);
				}
				if ($this->loginController->IsUserLoggedIn()) 
				{
					$this->htmlBody .= $this->appView->showAddNewComment();
				}
				$this->htmlBody .= $this->appView->getIndexLink();
				
			}
			else
			{
				$this->htmlBody .= "Not found";
			}

			
			
		}

		else if($this->appView->userWantsToSeeItem())
		{
			$id = $this->appView->getSeeItemID();
			$item = $this->itemModel->getItemById($id);
			$this->htmlBody .= $this->appView->showItem($item);
		}
		else if($this->LoginView->userWantsToRegister())
		{
			if($this->LoginView->userHavePostedRegisterInfo())
			{
				$username = $this->LoginView->getRegisterUsername();
				$password = $this->LoginView->getRegisterPassword();

				// validte
				if(strlen($username) > 0 && strlen($password) > 0)
				{
					$userFromDB = $this->dbConnection->getUserFromUsername($username);
					if(count( $userFromDB ) == 0)
					{
						$this->loginController->registerUser($username, $password);
						$this->appView->registerCompleteSuccessMessage();
						
					}
					else
					{
						$this->appView->usernameAlreadyExistsErrorMessage();
						$this->htmlBody .= $this->LoginView->getRegisterHTML();
					}					
				}
				else
				{
					$this->appView->registerFailErrorMessage();
					$this->htmlBody .= $this->LoginView->getRegisterHTML();
				}
				
			}
			else
			{
				$this->htmlBody .= $this->LoginView->getRegisterHTML();
			}
		}
		else
	 	{
			$this->allChamps();
			if($loggedIn)
			{
				$this->htmlBody .= $this->appView->getAddBuildHTML();
			}
			
		}
			if(!$this->LoginView->userWantsToRegister())
			{
				$this->WriteLoginHTML();
			}
			
			$errors = "";
			$successes ="";
		if ($this->appView->hasErrors())
		{
			$errors = $this->appView->getErrorHTML();
		}
		if ($this->appView->hasSuccesses())
		{
			$successes = $this->appView->getSuccessHTML();
		}

		return $this->html->getHTMLPage($this->htmlBody, $errors, $successes);
	}
	
	public function allChamps()
	{
		
		$champArray = $this->champModel->getChamps();
		foreach ($champArray as $champ) 
		{
			$this->htmlBody.= $this->appView->showChamps($champ->getChampID(),$champ->getChampName());
		}
		//$this->htmlBody .= $this->appView->firstPagelol();
		
		//return $this->html->getHTMLPage($this->htmlBody);
	}
	
	public function WriteLoginHTML()
	{
		// If user is logged in
		if($this->loginController->IsUserLoggedIn())
		{
			// HTML
			$this->htmlBody .= $this->loginController->initializeLoggedIn();
			
			$this->userIsLoggedIn();
		}
		else
		{
			// HTML
			$this->htmlBody .= $this->loginController->initializeLoggedOut();
			
			$this->userIsLoggedOut();
		}
	}

	public function allItems()
	{		
		$itemArray = $this->itemModel->getItems();
		foreach ($itemArray as $item) 
		{
			$this->htmlBody.= $this->appView->showItems($item->getItemID(),$item->getItemName());
		}
		//$this->htmlBody .= $this->appView->firstPagelol();
		
		//return $this->html->getHTMLPage($this->htmlBody);
	}
	
	public function UserIsLoggedIn()
	{
		$this->loggedStatus = $this->LoginView->getLoggedInUserMessage();
		//$this->title = $this->LoginView->getLoggedInTitle();
	}
	
	/**
	 * user is confirmed as not logged in.
	 */
	public function UserIsLoggedOut()
	{
		$this->loggedStatus = $this->LoginView->getNotLoggedInStatus();
		$this->title = $this->LoginView->getNotLoggedInTitle();
	}	
}
