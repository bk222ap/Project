<?php

namespace Model;

class BuildLevels{
	private $arr = array();

	public function __construct($l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$l11,$l12,$l13,$l14,$l15,$l16,$l17,$l18)
	{
		array_push($this->arr, $l1);
		array_push($this->arr, $l2);
		array_push($this->arr, $l3);
		array_push($this->arr, $l4);
		array_push($this->arr, $l5);
		array_push($this->arr, $l6);
		array_push($this->arr, $l7);
		array_push($this->arr, $l8);
		array_push($this->arr, $l9);
		array_push($this->arr, $l10);
		array_push($this->arr, $l11);
		array_push($this->arr, $l12);
		array_push($this->arr, $l13);
		array_push($this->arr, $l14);
		array_push($this->arr, $l15);
		array_push($this->arr, $l16);
		array_push($this->arr, $l17);
		array_push($this->arr, $l18);
	}


	public function getl($index)
	{
		return $this->arr[$index];
	}
}