<?php
/*
 * This is our dbConnector class - we want this so we have one connection to the db.
 * 
 */

 class DbConnector{
 	
	public $db_handle;
	
	public function __construct($db_connection_array = null){
		/*
		 * The constructor for the object.  We pass it a user object so we can act upon that user.
		 * 
		 * $db_connection_array :: array :: an array can be passed so we can use it for the connection vars.
		 * 
		 */
		$this->new_connection($db_connection_array);
	}

	
	public function new_connection($db_connection_array = null){
		/*
		 * We want this as a public function so we can call it if we want to connect using a different db etc
		 * 
		 * $db_connection_array :: array :: an array can be passed so we can use it for the connection vars.
		 * 
		 */	
		if($this->db_handle != null){ // if we've got a connection already, lets end it.
			$this->db_handle = null;
		}
		 
		if($db_connection_array == null){
			$db_host = DB_HOST;
			$db_name = DB_NAME;
			$db_username =DB_USERNAME;
			$db_password = DB_PASSWORD;		
		}else{
			 
			$db_host = $db_connection_array['db_host'];
			$db_name = $db_connection_array['db_name'];
			$db_username =$db_connection_array['db_username'];
			$db_password = $db_connection_array['db_password'];
		}
		
		try{
			$this->db_handle = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}	
			
	}
	
	
	public function __destruct(){
		$this->db_handle = null;
	}
 }
?>
