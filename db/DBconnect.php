<?php

namespace db;
class ConnectDB
{
	private $host ="localhost";
	private $user = "bk222ap";
	private $password = "Benjamin91";
	private $databas = "champbuilder";
	private $dbCon;
	
	//Ansluter till Databasen
	
	public function connectToDB()
	{
		$this->dbCon = mysqli_connect($this->host, $this->user, $this->password, $this->databas);	
		
		if (mysqli_errno($this->dbCon)) 
		{
			echo "DB FEL"; //mysqli_connect_error(); TODO:KASTA EXCEPTION
							//exit();
		}
	}

	// Hämtar ut alla champs ifrån databasen.
	public function getChamps()
	{
  		$this->connectToDB();
  
 	 	$retArray = array();
 	 	//$this->mysqli->query("SET @CID = " . "'" . $this->mysqli->real_escape_string($CID) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetChamps()")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	
	}
	
	
	/* Fetches a chosen build for a champ.
	*
	* RETURN: Array with all build id connected to the champ
	*/
	
	public function getBuildByChampID($id)
	{
		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetBuildByChampID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}
	
	/* Fetches chosen champ with ID
	*
	* RETURN: Array with champ
	*/
	public function getChampByID($id)
	{
		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetChampByID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}
	
	public function getBuildItemsByID($id)
	{
  		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetBuildItemsByID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}
	public function getBuildByID($id)
	{
  		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetBuildByID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}
	
	public function getItemById($id)
	{
		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetItemByID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}
	
	public function getItems()
	{
		$this->connectToDB();
  
 	 	$retArray = array();
 	
		if (!$result = $this->dbCon->query("CALL GetItems()")) 
		{
			throw new \Exception($this->dbCon->error, $this->dbCon->errno);
		}
	 	
	 	else
	 	{
			if($result->num_rows > 0) 
	  		{
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	       		{
	       			array_push($retArray, $row);
	       		}
	   	 	}   
	 	}
		
	// Free
 	mysqli_free_result($result);
 	mysqli_close($this->dbCon);
 	// Return
 	return $retArray;
	
	}

	public function getUserFromUsername($un)
	{
		$this->connectToDB();
  		$this->dbCon->query("SET @un = " . "'" . $this->dbCon->real_escape_string($un) . "'");
 	 	$retArray = array();
 	
		if (!$result = $this->dbCon->query("CALL GetUserFromUsername(@un)")) 
		{
			throw new \Exception($this->dbCon->error, $this->dbCon->errno);
		}
	 	
	 	else
	 	{
			if($result->num_rows > 0) 
	  		{
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	       		{
	       			array_push($retArray, $row);
	       		}
	   	 	}   
	 	}
		
	// Free
 	mysqli_free_result($result);
 	mysqli_close($this->dbCon);
 	// Return
 	return $retArray;
	
	}

public function addComment($buildId, $userId, $comment)
{
		$this->connectToDB();
  
 	 	$this->dbCon->query("SET @buildId = " . "'" . $this->dbCon->real_escape_string($buildId) . "'");
 	 	$this->dbCon->query("SET @userId = " . "'" . $this->dbCon->real_escape_string($userId) . "'");
 	 	$this->dbCon->query("SET @comment = " . "'" . $this->dbCon->real_escape_string($comment) . "'");
 
	 	 if (!$result = $this->dbCon->query("CALL AddComment(@buildId,@userId,@comment)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}	
  
		// Free
		mysqli_close($this->dbCon);
	}


public function registerUser($username, $pass)
{
		$this->connectToDB();
  
 	 	$this->dbCon->query("SET @username = " . "'" . $this->dbCon->real_escape_string($username) . "'");
 	 	$this->dbCon->query("SET @pass = " . "'" . $this->dbCon->real_escape_string($pass) . "'");
 
	 	 if (!$result = $this->dbCon->query("CALL RegisterUser(@username,@pass)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}	
  
		// Free
		mysqli_close($this->dbCon);
	}


	public function addBuild($completeBuild)
	{
		$this->connectToDB();
 	 	$this->dbCon->query("SET @champid = " . "'" . $this->dbCon->real_escape_string($completeBuild->getChampID()) . "'");
 		for($i = 1; $i <= 6; $i++){
 			$this->dbCon->query("SET @i" . $i . " = " . "'" . $this->dbCon->real_escape_string($completeBuild->getItem($i - 1)) . "'");
 		}
 		for($i = 1; $i <= 18; $i++){
 			$this->dbCon->query("SET @l" . $i . " = " . "'" . $this->dbCon->real_escape_string($completeBuild->getAbility($i - 1)) . "'");
 		}
		$this->dbCon->query("SET @title = " . "'" . $this->dbCon->real_escape_string($completeBuild->getTitle()) . "'");
	 	$this->dbCon->query("SET @desc = " . "'" . $this->dbCon->real_escape_string($completeBuild->getDescription()) . "'");
	 	if (!$result = $this->dbCon->query("CALL AddBuild(@champid,@i1,@i2,@i3,@i4,@i5,@i6,@title,@desc, @l1,@l2,@l3,@l4,@l5,@l6,@l7,@l8,@l9,@l10,@l11,@l12,@l13,@l14,@l15,@l16,@l17,@l18)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}	
  
		// Free
		mysqli_close($this->dbCon);
	}

public function getAllCommentsForID($id)
{
		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL getAllCommentsForID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}


	public function getLevelsByID($id)
	{
		$this->connectToDB();
  
 	 	$retArray = array();
 	 	$this->dbCon->query("SET @id = " . "'" . $this->dbCon->real_escape_string($id) . "'");
 
	 	if (!$result = $this->dbCon->query("CALL GetLevelsByID(@id)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}
 
	  	else
	  	{
   
  	 		if($result->num_rows > 0) 
  	 		{
       			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       			{
        			array_push($retArray, $row);
       			}
   	 		}   
 	 	}	
  
	// Free
	mysqli_free_result($result);
	mysqli_close($this->dbCon);
 	// Return
 	 return $retArray;
	}

	public function LoginUser($user, $pass)
	{
		$this->ConnectToDB();
		
		$retArray = array();
		// Prepare IN and OUT parameters
		$this->dbCon->query("SET @user = " . "'" . $this->dbCon->real_escape_string($user) . "'");
		$this->dbCon->query("SET @pass = " . "'" . $this->dbCon->real_escape_string($pass) . "'");
		
		if (!$result = $this->dbCon->query("CALL LoginUser(@user,@pass)"))
		{
			throw new DBConnectionException($this->dbCon->error, $this->dbCon->errno);
		}
		else{
			
			if($result->num_rows > 0) 
			{
			    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			    {
			    	array_push($retArray, $row);
			    }
			}			
		}
		
		// Free
		mysqli_free_result($result);
		mysqli_close($this->dbCon);
		// Return
		return $retArray;
	}
}