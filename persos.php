<?php

    class Personnages {
        private $_nom;
        private $_degats;
        private $_force;
        private $_experience;

        public function __construct {
            $this-> nom = $_nom;
        }

        public function gagnerExperience() {
            $this->_experience++;
        }

        public function frapper(Personnages $persoAFrapper) {
            $persoAFrapper->_degats += $this->_force;
        }        

    }

    $Paul = new Personnages;
    $Bruce = new Personnages;
    $Bruce->frapper($Paul);
    $Bruce->gagnerExperience();
    echo $Paul;

?>