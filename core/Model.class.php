<?php
/*
 * This is the core model class
 * 
 */
 
 	class Model{
 		private $db = null;
 		private $table = null;
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

		public function setNames($ser_names){
			$this->db_handle->exec($this->set_names);
		}

		public function getColumns(){

			$sql = "SELECT * FROM $this->table LIMIT 0";
			$st = $this->db_handle->prepare($sql);
			$st->execute();
			for ($i = 0; $i < $st->columnCount(); $i++) {
			    $col = $st->getColumnMeta($i);
			    $columns[] = $col['name'];
			}
			print_r($columns);
			
		}
 	}
?>
