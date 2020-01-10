<?php
	class Customer{
		public $id;
		public $name;
		public $phone;
		public $address;

		function __construct($id, $name, $phone, $address){
			$this->id= $id;
			$this->name= $name;
			$this->phone= $phone;
			$this->address= $address;
		}
	}
	
?>