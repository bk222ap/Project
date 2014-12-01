<?php
namespace controller;
class LoginController{
	private $loginModel;
	private $applicationDAL;
	private $loginView;	
	private $loggedInUser;
	private $isLoggedInWithPost = false;
	private $isLoggedInWithCookies = false;
	private $isLoggedInWithSession = false;
	private $commentView;

	
	public function __construct($appDAL, $loginView){
		$this->loginModel = new \model\LoginModel();
		$this->loginView = $loginView;
		$this->applicationDAL = $appDAL;
	}

	public function successfullLogin($username,$password)
	{
		// Hash password
		$hPass = $this->loginModel->GetEncryptedString($password);
		// Check Database		
		$user =  $this->applicationDAL->LoginUser($username, $hPass);
		// Can only be one user
		if(count($user) == 1)
		{
			// Save user
			$this->loggedInUser = new \model\User($user[0]['ID'],$user[0]['Username'],$user[0]['pass']);
			return true;
		}
		else
		{
			return false;
		}
	}

	/*
	*	Checks if User is LoggedIn
	*/
	public function isUserLoggedIn()
	{
		if ($this->isLoggedInWithPost || 
		$this->isLoggedInWithSession ||
		$this->isLoggedInWithCookies)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * @return Array with inlogged users information
	 */
	public function getLoggedInUser()
	{
		return $this->loggedInUser;
	}
	
	public function userWantsToLogout()
	{
		return $this->loginView->userWantsToLogout();	
	}
	
	public function tryLoginWithSession()
	{
		$isLoggedInWithSession = false;		
		if ($this->loginView->validateSession())
		{
			$username = $this->loginView->getSessionUsername();
			$password = $this->loginView->getSessionPassword();
			$isLoggedInWithSession = $this->successfullLogin(
									 $username,$password);
		}
		return $isLoggedInWithSession;
	}	
	
	public function tryLoginWithCookies()
	{
		$isLoggedInWithCookies = false;		
		if ($this->loginView->validateCookies())
		{
			$username = $this->loginView->getCookieUsername();
			$password = $this->loginView->getCookiePassword();
			$isLoggedInWithCookies = $this->successfullLoginWithCookies(
									 $username,$password);
		}
		return $isLoggedInWithCookies;
	}
	
	public function tryLoginWithPost()
	{
		$isLoggedInWithPost = false;		
		$username = $this->loginView->getPostUsername();
		$password = $this->loginView->getPostPassword();
		$this->loginView->setInputUsernamePost();
		$isLoggedInWithPost = $this->successfullLogin($username,$password);
		if (!$isLoggedInWithPost)
		{
			$this->loginView->setInputErrors();
		}
		return $isLoggedInWithPost;
	}
	
	public function successfullLoginWithCookies($username,$password)
	{
		return $this->loginModel->checkAuthentication($username,$password);
	}			
	
	
	public function loggedInWithPost()
	{
		$this->loginView->setSession();
		$this->loginView->setLoggedInWithPostMessage();
		$this->loginView->setUsernamePost();
	}
	
	public function loggedInWithSession()
	{
		$this->loginView->setUsernameSession();
	}	
	
	public function loggedInWithCookies()
	{
		$this->loginView->setLoggedInWithCookieMessage();
		$this->loginView->setUsernameCookie();
		$this->loginView->setSessionWithCookies();
	}		
	
	/**
	 * @return string HTML structure
	 */

	public function initializeLoggedIn()
	{
		if ($this->loginView->userWantsToBeRemembered())
		{
			$this->loginView->setCookies();
			$this->loginView->setRemeberMessage();
		}
		$html = $this->loginView->getLoggedInHTML();
		return $html;
	}
	
	/**
	 * @return string HTML structure
	 */
	public function initializeLoggedOut()
	{
		if ($this->userWantsTologout())
		{
				if($this->loginView->logoutSessionExists())
				{
					$this->loginView->setLoggedOutSuccessMessage();
				}
				$this->loginView->destroySession();
				$this->loginView->destroyCookies();
		}
		$html = $this->loginView->getNotLoggedInHTML();
		return $html;
	}
	
	public function checkLoginEvents()
	{	
		$userWantsTologout = $this->UserWantsToLogout();
		
		if($this->loginView->UserHaveSession() && !$userWantsTologout)
		{
		   	$this->userHaveSession();
		}		
		else if($this->loginView->UserHaveCookies() && !$userWantsTologout)
		{
			$this->userHaveCookies();
		}
		
		if ($this->loginView->UserHavePostedSomething()&& !$userWantsTologout)
		{
			$this->userHavePostedSomething();
		}
	}

	/**
	 * try loggin with users session
	 */
	public function userHaveSession()
	{
		$this->isLoggedInWithSession = $this->TryLoginWithSession();
		if ($this->isLoggedInWithSession)
		{
			$this->LoggedInWithSession();
		}
	}
	
	/**
	 * try loggin with users cookie
	 */
	public function userHaveCookies()
	{
		$this->isLoggedInWithCookies = $this->TryLoginWithCookies();
		if ($this->isLoggedInWithCookies)
		{
			$this->LoggedInWithCookies();
		}
	}
	
	/**
	 * try loggin with users information
	 */
	public function userHavePostedSomething()
	{
		$this->isLoggedInWithPost = $this->TryLoginWithPost();
		if ($this->isLoggedInWithPost)
		{
			$this->LoggedInWithPost();
		}
	}

	public function registerUser($username, $password)
	{
		$hPass = $this->loginModel->GetEncryptedString($password);
		$this->applicationDAL->registerUser($username, $hPass); 
	}

	private function SQLInjectionCheck($subject)
	{				
		return !preg_match($this->SQLpattern, $subject);
	}
}