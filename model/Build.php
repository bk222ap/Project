<?php

namespace Model;

class Build{
	
	private $ID;
	private $champID;
	private $title;
	private $description;
	
	public function __construct($ID, $champID, $title, $description){
		$this->ID = $ID;
		$this->champID = $champID;
		$this->title = $title;
		$this->description = $description;
	}
	
	public function getID(){
		return $this->ID;
	}
	
	public function getChampID(){
		return $this->champID;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getDescription(){
		return $this->description;
	}
}
