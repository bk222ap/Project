<?php

namespace Model;

class CompleteBuild
{
	private $champID;
	private $i1;
	private $i2;
	private $i3;
	private $i4;
	private $i5;
	private $i6;
	private $l1;
	private $l2;
	private $l3;
	private $l4;
	private $l5;
	private $l6;
	private $l7;
	private $l8;
	private $l9;
	private $l10;
	private $l11;
	private $l12;
	private $l13;
	private $l14;
	private $l15;
	private $l16;
	private $l17;
	private $l18;
	private $title;
	private $description;

	public function __construct($champID, $i1,$i2,$i3,$i4,$i5,$i6, $title, $description, 
		$l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$l11,$l12,$l13,$l14,$l15,$l16,$l17,$l18){
		$this->champID = $champID;
		$this->i1 = $i1;
		$this->i2 = $i2;
		$this->i3 = $i3;
		$this->i4 = $i4;
		$this->i5 = $i5;
		$this->i6 = $i6;

		$this->l1 = $l1;
		$this->l2 = $l2;
		$this->l3 = $l3;
		$this->l4 = $l4;
		$this->l5 = $l5;
		$this->l6 = $l6;
		$this->l7 = $l7;
		$this->l8 = $l8;
		$this->l9 = $l9;
		$this->l10 = $l10;
		$this->l11 = $l11;
		$this->l12 = $l12;
		$this->l13 = $l13;
		$this->l14 = $l14;
		$this->l15 = $l15;
		$this->l16 = $l16;
		$this->l17 = $l17;
		$this->l18 = $l18;


		$this->title = $title;
		$this->description = $description;
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

	public function getI1(){
		return $this->i1;
	}

	public function getI2(){
		return $this->i2;
	}

	public function getI3(){
		return $this->i3;
	}

	public function getI4(){
		return $this->i4;
	}

	public function getI5(){
		return $this->i5;
	}

	public function getI6(){
		return $this->i6;
	}

	public function getl1(){
		return $this->l1;
	}

	public function getl2(){
		return $this->l2;
	}

	public function getl3(){
		return $this->l3;
	}

	public function getl4(){
		return $this->l4;
	}

	public function getl5(){
		return $this->l5;
	}

	public function getl6(){
		return $this->l6;
	}

	public function getl7(){
		return $this->l7;
	}


	public function getl8(){
		return $this->l8;
	}

	public function getl9(){
		return $this->l9;
	}


	public function getl10(){
		return $this->l10;
	}

	public function getl11(){
		return $this->l11;
	}

	public function getl12(){
		return $this->l12;
	}


	public function getl13(){
		return $this->l13;
	}

	public function getl14(){
		return $this->l14;
	}


	public function getl15(){
		return $this->l15;
	}

	public function getl16(){
		return $this->l16;
	}


	public function getl17(){
		return $this->l17;
	}

	public function getl18(){
		return $this->l18;
	}
}