<?php
include_once '../data/clientandhomeadministrationdata.php';
    class ClientAndHomeAdministrationBussiness{
        private $data;
        public function __construct(){
            $this->data = new ClientAndHomeAdministrationData();
        }
        
        public function getUsers(){
            return $this->data->getUsers();
        }
        public function active($id){
            return $this->data->active($id);
        }
        public function deActive($id){
            return $this->data->deActive($id);
        }
    }
?>