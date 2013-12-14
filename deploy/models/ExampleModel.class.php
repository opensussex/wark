<?php
	class ExampleModel extends Model{
		
		private $table = 'example';
		private $set_names = "SET NAMES utf8";

		public function __construct($db = null){
			parent::__construct($db);
			parent::setTable($this->table);
			parent::setNames($this->set_names);
			parent::setColumns();
		}
						
		public function example(){
		
		}

		
	}

?>
