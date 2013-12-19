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


 	}