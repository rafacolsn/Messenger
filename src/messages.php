<?php
    class Message {
        public $author_id;
        public $conversation_id;
        public $content;
        public function __construct($author_id,$conversation_id,$content) {
            $this->author_id = $author_id;
            $this->conversation_id = $conversation_id;
            $this->content = $content;
        }
    }
?>