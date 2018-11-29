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
    }
    
    public function delete(Message $msg) {
    }

    public function get($id) {

    }
    public function getList() {
        
        $get_messages = $this->connect->prepare("SELECT m.content AS contenu, DATE_FORMAT(m.date_creation, '%d/%m/%Y %Hh%i') AS date_crea, m.conversation_id AS conv_id, m.author_id AS author, u.username AS pseudo
        FROM T_MESSAGES m 
        INNER JOIN T_USERS u ON m.author_id = u.id_user 
        ORDER BY date_crea ASC");
        $get_messages->execute(); 
        // requête pour afficher les messages avec leurs auteurs et l'id de la conversation

        $conv_id = 21; //à remplacer par un $_SESSION['topic'] ?
    
        // on récupère les infos de la requête dans un tableau
        // on fait une boucle qui génère des balises li
        $msg_list = [];
        while ($donnees = $get_messages->fetch()) {  
            if ($donnees['conv_id'] == $conv_id) {
                $msg_list = new Message($donnees['author'], $donnees['conv_id'], $donnees['contenu']);
            }; 

        };
        return $msg_list;
    }
    public function update(Message $msg) {

    }
}
?>