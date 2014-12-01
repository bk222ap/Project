<?php
namespace view;
class LoginView{

	private static $postUsernameString = "NameOfUser";
	private static $postPasswordString = "Password";
	private static $postRegisterUsernameString = "NameOfUserRegister";
	private static $postRegisterPasswordString = "PasswordRegister";
	private static $postPasswordIndex;
	private static $rememberMeChecked = "Checked";
	private $errorMessage = "";
	private $userNameInput = "";
	private $loggedInTitle =  "LoL Buil Builder - Logged in";
	private $notLoggedInTitle = "LoL Buil Builder";
	private $notLoggedInString = "Not logged in"; 
	private $loggedInUserMessage = " is ready to build some builds";
	private static $logoutString = "logout";
	private static $IP = "IP";
	private static $userAgent = "UserAgent";
	private static $pressedlogoutString = "pressedlogout";
	private $loggedInMessage = "";
	private static $endTimeFileName = "endtime.txt";
	private static $timeInSec = 3660;
	private $loggedInUser;
	private $registerString = "RegisterNewUser";


	public function __construct()
	{
		self::$postPasswordIndex = self::$postPasswordString . "_";
	}
	

	public function getNotLoggedInHTML()
	{
		$button = "button";
		return '
		<div id="login"><form action="?login" method="post"
				 enctype="multipart/form-data">
					<fieldset>	
						<legend>
						Login - Enter username and password.
						</legend>
						<p>'. $this->GetErrorMessage() .'<p>				
						<label for="UserNameID">Username :</label>
						<input type="text" size="20" name="' 
						. self::$postUsernameString .
						'" id="UserNameID" value="' .
						$this->getInputUsernamePost() . '">
						<label for="PasswordID">Password  :</label>
						<input type="password" size="20" name="' .
						self::$postPasswordString .
						' " id="PasswordID" value="">
						<a href="index.php?' . $this->registerString . '">Register a new User</a><br>
						<label for="AutologinID">Keep me logged in  :</label>
						<input type="checkbox" name="' . 
						self::$rememberMeChecked . 
						'" id="AutologinID"><br>
						<input class="mainBody" type="submit" name="' .
						$button . 
						' " value="Login">
					</fieldset>
				</form>
			</div>'
				;
	}

	public function getRegisterHTML()
	{
		return '<div id="login"><form action="?' . $this->registerString .'" method="post"
				 enctype="multipart/form-data">
					<fieldset>	
						<legend>
						Register
						</legend>
						<p>'. $this->GetErrorMessage() .'<p>				
						<label for="UserNameID">Username :</label>
						<input type="text" size="20" name="' 
						. self::$postRegisterUsernameString .
						'" id="UserNameID" value="' .
						$this->getInputUsernamePost() . '">
						<label for="PasswordID">Password  :</label>
						<input type="password" size="20" name="' .
						self::$postRegisterPasswordString .
						' " id="PasswordID" value="">
						<input type="submit" name="button" value="Register">
					</fieldset>
				</form>
			</div>'
				;
	}

	public function userWantsToRegister()
	{
		return isset($_GET[$this->registerString]);
	}

	public function userHavePostedRegisterInfo()
	{
		return isset($_POST[self::$postRegisterUsernameString]) && isset($_POST[self::$postRegisterPasswordString . "_"]);
	}

	public function getRegisterUsername()
	{
		return $_POST[self::$postRegisterUsernameString];
	}
	
	public function getRegisterPassword()
	{
		return $_POST[self::$postRegisterPasswordString . "_"];
	}


	public function getLoggedInHTML()
	{
		$returnString = $this->getLoggedInMessage();
		
		return $returnString .= 
			   '<p class="notTheSameAsTheOthers"><a href="?' .
			   self::$logoutString . 
			   '">Logout</a></p>';
	}
	

	public function getLoggedInMessage()
	{
		return $this->loggedInMessage;
	}
	

	private function setLoggedInMassage($message)
	{
		$this->loggedInMessage = $message;
	}
	
	public function setLoggedInWithPostMessage()
	{
		$message = "<p id='loggedInMessage'>Login successful! </p>";
		$this->setLoggedInMassage($message);
	}
	
	public function setLoggedInWithCookieMessage()
	{
		$message = "Login successful!.";
		$this->setLoggedInMassage($message);
	}
	
	public function setRemeberMessage()
	{
		$message = "Login successful and you will be remembered next time!";
		$this->setLoggedInMassage($message);
	}
	
	public function setLoggedOutSuccessMessage()
	{
		$message = "You have now logged out.";
		$this->setErrorMessage($message);
	}
	
	public function getLoggedInUserMessage()
	{
		return $this->loggedInUserMessage;
	}
	
	public function getErrorMessage()
	{
		return $this->errorMessage;
	}
	
	public function setErrorMessage($message)
	{
		$this->errorMessage = $message;
	}
	
	public function getLoggedInTitle()
	{
		$this->loggedInTitle .= " as " . $this->loggedInUser;
		return $this->loggedInTitle;
	}
	
	public function getNotLoggedInTitle()
	{
		return $this->notLoggedInTitle;
	}
	
	public function getNotLoggedInStatus()
	{
		return $this->notLoggedInString;
	}
	

	// POSTS BELOW
	public function userTriesToLogin()
	{
		return (isset($_POST[self::$postUsernameString]) &&
				isset($_POST[self::$postPasswordIndex]) &&
				$_POST[self::$postUsernameString] != "" &&
				$_POST[self::$postPasswordIndex] != "");
	}
	
	public function userHavePostedSomething()
	{
		return (isset($_POST[self::$postUsernameString]) ||
				isset($_POST[self::$postPasswordIndex]));
	} 	

	public function userWantsToBeRemembered()
	{
		return isset($_POST[self::$rememberMeChecked]);
	}
	

	public function userWantsToLogout()
	{
		return isset($_GET[self::$logoutString]);
	}
	

	public function getPostUsername()
	{
		return $_POST[self::$postUsernameString];
	}
	
	public function getPostPassword()
	{
		return $_POST[self::$postPasswordIndex];
	}
	
	public function setInputUsernamePost()
	{
		$this->userNameInput = $_POST[self::$postUsernameString];
	}
	public function setUsernameSession()
	{
		$this->loggedInUser = $_SESSION[self::$postUsernameString];
	}
	
	public function setUsernameCookie()
	{
		$this->loggedInUser = $_COOKIE[self::$postUsernameString];
	}
	
	public function setUsernamePost()
	{
		$this->loggedInUser = $_POST[self::$postUsernameString];
	}
	

	public function getInputUsernamePost()
	{
		return $this->userNameInput;
	}
	

	 public function getLoggedInUser()
	 {
	 	return $this->loggedInUser;
	 }
	
	
	public function setSession()
	{
		$_SESSION[self::$postUsernameString] = $this->getPostUsername();
		$_SESSION[self::$postPasswordIndex] = $this->getPostPassword();
		$_SESSION[self::$IP] = $_SERVER['REMOTE_ADDR'];
		$_SESSION[self::$userAgent] = $_SERVER['HTTP_USER_AGENT'];
		$this->MakeLogoutSession();	
	}
	

	public function setSessionWithCookies()
	{
		$_SESSION[self::$postUsernameString] = $this->getCookieUsername();
		$_SESSION[self::$postPasswordIndex] = $this->getCookiePassword();
		$_SESSION[self::$IP] = $_SERVER['REMOTE_ADDR'];
		$_SESSION[self::$userAgent] = $_SERVER['HTTP_USER_AGENT'];
		$this->MakeLogoutSession();	
	}
	
	
	public function setCookies()
	{
		$loginModel = new \model\LoginModel();
		setcookie(self::$postUsernameString,
 					    $this->getInputUsernamePost(),
 					    time() + intval(self::$timeInSec)
 					    );
		setcookie(self::$postPasswordIndex,
					 	$loginModel->getEncryptedString(
					 	$this->getPostPassword()),
					 	time() + intval(self::$timeInSec)			
					 	);
		file_put_contents(self::$endTimeFileName,
						  time() + intval(self::$timeInSec));
	}
		
	 public function userHaveSession()
	 {
	 	return (isset($_SESSION[self::$postUsernameString]) &&
				isset($_SESSION[self::$postPasswordIndex]));
	 }
	
	  public function userHaveCookies()
	 {
	 	return (isset($_COOKIE[self::$postUsernameString]) &&
				isset($_COOKIE[self::$postPasswordIndex]));
	 }

	  public function logoutSessionExists()
	 {
	 	return (isset($_SESSION[self::$pressedlogoutString]));
	 }
	
	
	 public function validateSession()
	 {
	 	return $_SESSION[self::$IP] == $_SERVER['REMOTE_ADDR'] &&
			   $_SESSION[self::$userAgent] == $_SERVER['HTTP_USER_AGENT'];
	 }
	
	public function destroySession()
	{
		session_destroy();
	}
	 
	
	public function validateCookies()
	{
		if(time() > file_get_contents(self::$endTimeFileName))
		{
			$this->setCookieError();
			return false; 	
		}
		else
		{
			return true;
		}
	}
	
	public function destroyCookies()
	{
		setcookie(self::$postUsernameString,"",time() - 3600);
		setcookie(self::$postPasswordIndex,"",time() - 3600); 
	}
	
	 public function getSessionUsername()
	 {
	 	return $_SESSION[self::$postUsernameString];
	 }
	 
	 public function getSessionPassword()
	 {
	 	return $_SESSION[self::$postPasswordIndex];
	 }
	 
	 
	 public function getCookieUsername()
	 {
	 	return $_COOKIE[self::$postUsernameString];
	 }
	
	 public function getCookiePassword()
	 {
	 	return $_COOKIE[self::$postPasswordIndex];
	 }
	
	private function MakeLogoutSession()
	{
		$_SESSION[self::$pressedlogoutString] = "";
	}
	
	public function setCookieError()
	{
		$this->destroyCookies();
		$this->errorMessage = "Cookie corrupted.";
	}
	
	public function setInputErrors()
	{
		$passMissing = "Please enter password.";
		$usernameMissing = "Please enter username.";
		$wrongUserOrPass = "Wrong username and/or password.";
		if (isset($_POST[self::$postUsernameString]) &&
			isset($_POST[self::$postPasswordIndex]))
		{
			if ($_POST[self::$postUsernameString] == "") 
			{
				$this->errorMessage = $usernameMissing;
			}
			else if ($_POST[self::$postPasswordIndex] == "")
			{
				$this->errorMessage = $passMissing;
			}	
			else {
				$this->errorMessage = $wrongUserOrPass;	
			}		
		}
	}
	
	public function GetRegisterString()
	{
		return $this->registerString;
	}
}