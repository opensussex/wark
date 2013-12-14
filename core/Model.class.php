<?php
/*
 * This is the core model class
 * 
 */
 
 	class Model{
 		private $db = null;
 		private $table = null;
 		private $columns = null;
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

		public function setTable($table){
			$this->table = $table;
			echo $this->table;
		}

		public function setColumns(){

			$sql = "DESCRIBE $this->table";
			$st = $this->db_handle->prepare($sql);
			
			if($st->execute()){
				$columns = $st->fetchAll(PDO::FETCH_ASSOC);
				if(count($columns > 0)){
					$this->columns = $columns;	
				}
			}
		}

		public function getColumns(){
			if($this->columns != null){
				return $this->columns;
			}else{
				return false;
			}
		}
 	}
?>
