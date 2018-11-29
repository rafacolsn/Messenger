<?php
    class Message {
        public $author_id;
        public $conversation_id;
        public $content;
        public $date_crea;
        public $date_modif;
        public $unread;
        
        public function __construct(array $donnees)
        {
          $this->hydrate($donnees);
        }
        

        public function hydrate(array $donnees) {
            // On fait une boucle avec le tableau de données
            foreach ($donnees as $key => $value) {
              // On récupère le nom des setters correspondants
              // si la clef est conversation_id son setter est setConversation_id
              // il suffit de mettre la 1ere lettre de key en Maj et de le préfixer par set
              $method = 'set'.ucfirst($key);
          
              // On vérifie que le setter correspondant existe
              if (method_exists($this, $method)) {
                // S'il existe, on l'appelle 
                $this->$method($value);
              }
            }
          }
        
        public function setAuthor_id($author_id) {
            $author_id = (int) $author_id;
            $this->author_id = $author_id;
        }

        public function setConversation_id($conversation_id) {
            $conversation_id = (int) $conversation_id;
            $this->conversation_id = $conversation_id;
        }

        public function setContent($content) {
            $this->content = $content;
        }
        public function setDate_crea($date_crea) {
            $this->date_crea = $date_crea;
        }
        public function setDate_modif($date_modif) {
            $this->date_modif = $date_modif;
        }
        public function setUnread($unread) {
            $this->unread = $unread;
        }

    }
?>