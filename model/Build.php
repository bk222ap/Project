<?php

namespace Model;

class Build{
	
	private $ID;
	private $champID;
	
	public function __construct($ID, $champID){
		$this->ID = $ID;
		$this->champID = $champID;
	}
	
	public function getID(){
		return $this->ID;
	}
	
	public function getChampID(){
		return $this->champID;
	}
}
