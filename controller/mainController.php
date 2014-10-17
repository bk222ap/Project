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
require_once "./model/Item.php";
require_once "./model/Build.php";

class mainController
{
	private $html;
	private $appView;
	private $htmlBody;
	private $champModel;
	private $itemModel;
	private $dbConnection;
	private $buildModel;
	
	public function __construct()
	{
		$this->dbConnection = new\db\connectDB();
		$this->itemModel = new\Model\ItemModel($this->dbConnection);
		$this->champModel = new\Model\ChampModel($this->dbConnection);
		$this->buildModel = new\Model\BuildModel($this->dbConnection);
		$this->appView = new\View\AppView();
		$this->html = new \View\HTMLView();
		$this->htmlBody = "";
		
	}
	
	public function startApp()
	{
		//user wants to see a champ
		if ($this->appView->userWantsToSeeChamp()) 
		{
			//get champ ID.
			$id = $this->appView->getSeeChampID();
			
			//validate
			if (is_numeric($id) && $id != -1) 
			{
				$builds = $this->champModel->getBuildByChampID($id);
				foreach ($builds as $build) 
				{
					$buildItems = $this->buildModel->getBuildByID($build->getID());
					$items = array();
					
					$item = $this->itemModel->getItemById($buildItems->getI1());
					array_push($items, new \Model\Item($item[0]['ID'], $item[0]['NAME']));
					$item = $this->itemModel->getItemById($buildItems->getI2());
					array_push($items, new \Model\Item($item[0]['ID'], $item[0]['NAME']));
					$item = $this->itemModel->getItemById($buildItems->getI3());
					array_push($items, new \Model\Item($item[0]['ID'], $item[0]['NAME']));
					$item = $this->itemModel->getItemById($buildItems->getI4());
					array_push($items, new \Model\Item($item[0]['ID'], $item[0]['NAME']));
					$item = $this->itemModel->getItemById($buildItems->getI5());
					array_push($items, new \Model\Item($item[0]['ID'], $item[0]['NAME']));
					$item = $this->itemModel->getItemById($buildItems->getI6());
					array_push($items, new \Model\Item($item[0]['ID'], $item[0]['NAME']));
						
					$this->htmlBody.=$this->appView->buildBuildsList($build, $items);
				}
			}
		}
		
		else
	 	{
			$this->allChamps();
		}
		return $this->html->getHTMLPage($this->htmlBody);
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
	
}
