<?php
    class User {

        public $email;
        public $firstname;
        public $lastname;
        public $username;
        public $password;

        public function __construct($email,$firstname,$lastname,$username,$password){
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->username = $username;
            $this->password = $password;
        }

    }
?>