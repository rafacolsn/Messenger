<?php

    class Personnages {
        public $_nom;
        public $_degats = 100;
        public $_force;
        public $_experience;

        public function __construct($_nom) {
            $this->_nom = $_nom;
        }
        
        public function setAttributes($force, $experience) {
            $this->_force = $force;
            $this->_experience = $experience;
        }


        public function frapper(Personnages $persoAFrapper) {
            $persoAFrapper->_degats -= $this->_force;
            $this->_experience++;
        }     
        
        

    }

    $paul = new Personnages("Paul");
    $bruce = new Personnages("Bruce");
    $paul->setAttributes(3,9);
    $bruce->setAttributes(12,5);


    $bruce->frapper($paul);
    $paul->frapper($bruce);
    $bruce->frapper($paul);
    $bruce->frapper($paul);
    $paul->frapper($bruce);
    
    echo $paul->_nom, ' a une force de ', $paul->_force, '. Il lui reste ', $paul->_degats, ' de points de vie, son expérience est de ', $paul->_experience, '<br />'; 
    
    echo $bruce->_nom, ' a une force de ', $bruce->_force, '. Il lui reste ', $bruce->_degats, ' de points de vie, son expérience est de ', $bruce->_experience, '<br />'; 
    

?>