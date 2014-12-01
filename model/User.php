<?php

namespace model;
class User
{
	private $ID;
	private $username;
	private $password;
	
	public function __construct($id, $uname, $pass)
	{
		$this->ID = $id;
		$this->userName = $uname;
		$this->password = $pass;
	}
	
	// GETTERS //
	public function getID()
	{
		return $this->ID;
	}
	
	public function getUsername()
	{
		return $this->userName;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
}