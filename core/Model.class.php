<?php
/*
 * This is the core model class
 * 
 */
 
 	class Model{
 		private $db = null;
		public $db_handle = null;
 		public function __construct($db = null){
 			$this->db = $db;
 			$this->db_handle = $db->db_handle;
 		}
		
 		
		public function getDB(){
			return $this->db;
		}
		
		public function getDBHandle(){
			return $this->db_handle;
		}
 	}
?>
