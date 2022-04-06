<?php

class Data {

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function __construct(){
       
        $hostName = gethostname();
        
        switch ($hostName) {
            case "pc-nulla": //Office's PC
                
                $this->isActive = false;
                $this->server = "";
                $this->user = "";
                $this->password = "";
                $this->db = "";
                break;
            case "DESKTOP-19VM7PS": //laptop's PC
               
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "dbtiendatecnologiacr";
                break;
            
            default: //Hosting
           
                 $this->isActive = false;
      			 $this->server = "localhost";
      			 $this->user = "id18652652_root";
      			 $this->password = "ZfUd7&t4%qHb%{=i";
      			 $this->db = "id18652652_dbcooperativacoopehorquetas"; 
                break;
        }
    }

}