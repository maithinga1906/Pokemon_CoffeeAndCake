<?php
//require "conect.php";
	class Cart{
		public $id;
		public $proName;
		//public $userName;
		public $proImage;
		public $proPrice;
		public $quantity;
		function __construct($id, $proName,$proImage, $proPrice, $quantity){
			$this->id= $id;
			$this->proName= $proName;
			$this->proImage= $proImage;
			$this->proPrice= $proPrice;
			//$this->userName= $userName;
			$this->quantity= $quantity;

		}
	}

	
	// var_dump($cart);
