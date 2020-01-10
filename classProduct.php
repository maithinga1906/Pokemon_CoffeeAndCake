<?php
	class Product{
		public $id;
		public $name;
		public $type;
		public $price;
		public $image;

		function __construct($id, $name, $type, $price, $image){
			$this->id= $id;
			$this->name= $name;
			$this->type= $type;
			$this->price= $price;
			$this->image= $image;
		}
	}
?>