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
	public function getChampByID($id){
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


	public function addBuild($completeBuild){
		$this->connectToDB();
  		echo "adding";
 	 	$this->dbCon->query("SET @champid = " . "'" . $this->dbCon->real_escape_string($completeBuild->getChampID()) . "'");
 		$this->dbCon->query("SET @i1 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getI1()) . "'");
	 	$this->dbCon->query("SET @i2 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getI2()) . "'");
	 	$this->dbCon->query("SET @i3 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getI3()) . "'");
	 	$this->dbCon->query("SET @i4 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getI4()) . "'");
	 	$this->dbCon->query("SET @i5 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getI5()) . "'");
	 	$this->dbCon->query("SET @i6 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getI6()) . "'");
		$this->dbCon->query("SET @title = " . "'" . $this->dbCon->real_escape_string($completeBuild->getTitle()) . "'");
	 	$this->dbCon->query("SET @desc = " . "'" . $this->dbCon->real_escape_string($completeBuild->getDescription()) . "'");
	 	$this->dbCon->query("SET @l1 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl1()) . "'");
	 	$this->dbCon->query("SET @l2 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl2()) . "'");	
	 	$this->dbCon->query("SET @l3 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl3()) . "'");	
	 	$this->dbCon->query("SET @l4 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl4()) . "'");	
	 	$this->dbCon->query("SET @l5 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl5()) . "'");	
	 	$this->dbCon->query("SET @l6 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl6()) . "'");	
	 	$this->dbCon->query("SET @l7 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl7()) . "'");	
	 	$this->dbCon->query("SET @l8 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl8()) . "'");	
	 	$this->dbCon->query("SET @l9 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl9()) . "'");	
	 	$this->dbCon->query("SET @l10 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl10()) . "'");	
	 	$this->dbCon->query("SET @l11 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl11()) . "'");	
	 	$this->dbCon->query("SET @l12 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl12()) . "'");	
	 	$this->dbCon->query("SET @l13 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl13()) . "'");	
	 	$this->dbCon->query("SET @l14 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl14()) . "'");	
	 	$this->dbCon->query("SET @l15 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl15()) . "'");	
	 	$this->dbCon->query("SET @l16 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl16()) . "'");	
	 	$this->dbCon->query("SET @l17 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl17()) . "'");	
	 	$this->dbCon->query("SET @l18 = " . "'" . $this->dbCon->real_escape_string($completeBuild->getl18()) . "'");	
	 	if (!$result = $this->dbCon->query("CALL AddBuild(@champid,@i1,@i2,@i3,@i4,@i5,@i6,@title,@desc, @l1,@l2,@l3,@l4,@l5,@l6,@l7,@l8,@l9,@l10,@l11,@l12,@l13,@l14,@l15,@l16,@l17,@l18)")) 
	 	{
  	 		throw new \Exception($this->dbCon->error, $this->dbCon->errno);
 	 	}	
  
		// Free
		mysqli_close($this->dbCon);
	}

	public function getLevelsByID($id){
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
}