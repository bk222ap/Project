<?php

namespace Model;

class BuildItem{
	
	private $id;
	private $i1;
	private $i2;
	private $i3;
	private $i4;
	private $i5;
	private $i6;	
	
	public function __construct($ID, $i1, $i2, $i3, $i4, $i5, $i6)
	{
		$this->id = $ID;
		$this->i1 = $i1;
		$this->i2 = $i2;
		$this->i3 = $i3;
		$this->i4 = $i4;
		$this->i5 = $i5;
		$this->i6 = $i6;		
	}
	
	public function getID()
	{
		return $this->id;
	}
	
	public function getI1()
	{
		return $this->i1;
	}
	
	public function getI2()
	{
		return $this->i2;
	}
	
	public function getI3()
	{
		return $this->i3;
	}
	
	public function getI4()
	{
		return $this->i4;
	}
	
	public function getI5()
	{
		return $this->i5;
	}
	
	public function getI6()
	{
		return $this->i6;
	}
}
