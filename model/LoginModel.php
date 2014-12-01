<?php

namespace model;


class LoginModel
{
	private static $userName = "Admin"; 
	private static $password = "Password";
	private static $saltString = "WhySoSalty";
	private $alreadyLoggedin = false;

	public function checkAuthentication($inputuserName,$inputPassword)
	{
		if($inputuserName == self::$userName && 
		   $inputPassword == self::$password ||
		   $inputuserName == self::$userName && 
		   $inputPassword == $this->getEncryptedString(self::$password))
		{
		   		$this->alreadyLoggedin = true;
				return true;
		}

		return false;
	}
	public function getEncryptedString($string)
	{
		return md5($string . self::$saltString);
	}

}

