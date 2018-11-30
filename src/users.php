<?php

class Messages{

   public $_date;
   public $_content;
   public $_conversation;
   public $_author;
   // private $data;
   // public $surround = 'p';
   

   // public function __construct($data = array()) {
   //    $this -> data = $data;
      
   // }


   public function __construct($date, $content, $conversation, $author) {
      $this -> _date = $date;
      $this -> _content = $content;
      $this -> _conversation = $conversation;
      $this -> _author = $author;
      
   }

   


   // private function surround($html) {
   //    return "<{$this->surround}>{$html}<{$this->surround}>";
     
   // }

   // private function getValue ($index) {
   //    return isset($this->data[$index]) ? $this->data[$index] : null ;
   // }

   // public function input ($surname) {
   //  return  $this->surround(
   //     '<input type="text" name="" . $surname " . " value="' . $this->getValue($surname) . '">'
   //    );
   // }

   // public function submit() {
   // return   $this->surround( "<button type='submit'> Envoyer </button>");
   // }

   // public function textarea () {
   //    echo $this->textarea ('<textarea name="" id="" cols="30" rows="10"></textarea>');
   // }

}

?>
