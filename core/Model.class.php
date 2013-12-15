<?php
/*
 * This is the core model class
 * 
 */
 
 	class Model{
 		/**
 		 * [$db description]
 		 * @var [type]
 		 */
 		private $db = null;
 		private $table = null;
 		private $columns = null;
		public $db_handle = null;
 		public function __construct($db = null){
 			$this->db = $db;
 			$this->db_handle = $db->db_handle;
 		}
		
 		/**
 		 * [getDB description]
 		 * @return [type]
 		 */
		public function getDB(){
			return $this->db;
		}
		
		/**
		 * [getDBHandle description]
		 * @return [type]
		 */
		public function getDBHandle(){
			return $this->db_handle;
		}

		/**
		 * [setTable description]
		 * @param [type] $table
		 */
		public function setTable($table){
			$this->table = $table;
			//echo $this->table;
		}

		/**
		 * [setColumns description]
		 */
		public function setColumns(){

			$sql = "DESCRIBE $this->table";
			$st = $this->db_handle->prepare($sql);
			
			if($st->execute()){
				$columns = $st->fetchAll(PDO::FETCH_ASSOC);
				if(count($columns > 0)){
					$this->columns = $columns;	
				}
			}else{
				return false;
			}
		}

		/**
		 * [getColumns description]
		 * @return [type]
		 */
		public function getColumns(){
			if($this->columns != null){
				return $this->columns;
			}else{
				return false;
			}
		}

		/**
		 * [insert description]
		 * @param  [type] $insert_array [description]
		 * @return [type]         [description]
		 */
		public function insert($insert_array){
			if($this->columns == null){
 				if(!$this->setColums()){
					return false;
				}
			}

			foreach($insert_array as $key=>$value){
				// go through insert_array if a key doesn't exist in the columns of the model lets return a false.
				if(!isset($this->columns[$key])){
					return false;
				}
			}

			foreach($this->columns as $column=>$column_array){
				foreach($column_array as $field_attrib=>$value){
					echo $field_attrib . ' | ' . $value . '<br />';
					if($field_attrib == 'Null'){ // we first check to see if we're allowed to leave blank.
						if($value == 'NO'){ // if we're not 
							if($column_array['Default'] == ''){ // if Default = '' then we need a value passed
								return false;
							}
						}
					}
				}
			}
		}
 	}