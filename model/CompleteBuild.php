<?php

namespace Model;

class CompleteBuild
{	
	private $title;
	private $description;
	private $champID;

	private $abilityLevels = array();
	private $items = array();

	public function __construct($champID, $items, $title, $description,$abilities)
	{
		$this->champID = $champID;
		
		foreach($items as $item){
			array_push($this->items, $item);
		}

		foreach($abilities as $ability){
			array_push($this->abilityLevels, $ability);
		}


		$this->title = $title;
		$this->description = $description;
	}

	public function getChampID()
	{
		return $this->champID;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}
	
	public function getItem($index)
	{
		return $this->items[$index];
	}

	public function getAbility($index)
	{
		return $this->abilityLevels[$index];
	}
}