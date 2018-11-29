<?php
session_start();
require "assets/php/connect2db.php";


class MessagesManager {

    public $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function add(Message $msg) {
        $stmt = $this->connect->prepare("INSERT INTO T_MESSAGES (author_id,conversation_id,content) VALUES (:author,:convers,:content)");
        $stmt->bindValue(':author', $msg->author_id);
        $stmt->bindValue(':convers', $msg->conversation_id);
        $stmt->bindValue(':content', $msg->content);  
        $stmt->execute();

        $msg->hydrate([
            'author_id' => $msg->author_id,
            'conversation_id'=> $msg->conversation_id,
            'content' => $msg->content,
          ]);
    }
    
    public function delete(Message $msg) {
    }

    public function get($id) {

    }
    public function getList() {
        
        
        
    }
    public function update(Message $msg) {

    }
}
?>