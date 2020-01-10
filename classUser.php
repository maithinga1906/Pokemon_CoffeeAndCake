<?php 
	//require "conect.php";
 	

    class User{
        public $id;
        public $fullname;
        public $username;
        public $password;
        public $type;
        public function __construct($id, $fullname, $username, $password, $type){
            $this->id = $id;
            $this->fullname = $fullname;
            $this->username = $username;
            $this->password = $password;
            $this->type = $type;
        }
    }
   
    
     ?>