<?php
    namespace Models;

    class Role{

        private $idRole;
        private $description;

        public function __construct($idRole, $description){
            $this->idRole = $idRole;
            $this->description = $description;
        }

        public function setIdRole($idRole){
            $this->idRole = $idRole;
        }

        public function getIdRole(){
            return $this->idRole;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

    }

?>  