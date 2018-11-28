<?php

class Users {

   public $id;
   public $email
   public $firstname;
   public $lastname;
   public $username;
   private $_password;
   public $connected = true;
   
   public function __construct($id, $email, $firstname, $lastname, $username, $_password) {
      $this->id = $id;
      $this->email = $email;
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->username = $username;
      $this->_password = $password;
   }
}

?>
