<?php
    class Account{
        private $id;
        private $user;
        private $password;
        private $type;
        private $state;

        public function __construct($id, $user, $password, $type, $state){
            $this->id = $id;
            $this->user = $user;
            $this->password = $password;
            $this->type = $type;
            $this->state = $state;
        }

        public function getID(){
            return $this->id;
        }
        public function getUser(){
            return $this->user;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getType(){
            return $this->type;
        }
        public function getState(){
            return $this->state;
        }
    }
?>