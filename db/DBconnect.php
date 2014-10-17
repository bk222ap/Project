<?php

namespace db;
class ConnectDB
{
	private $host ="localhost";
	private $user = "bk222ap";
	private $password = "Benjamin91";
	private $databas = "champbuilder";
	private $dbCon;
	
	public function connectToDB()
	{
		$this->dbCon = mysqli_connect($this->host, $this->user, $this->password, $this->databas);	
		
		if (mysqli_errno($this->dbCon)) 
		{
			echo "DB FEL"; //mysqli_connect_error(); TODO:KASTA EXCEPTION
							//exit();
		}
	}

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
	
	public function getBuildByChampID($id){
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
	
	public function getItemById($id){
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
}