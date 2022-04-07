<?php
//Conexion a la base de datos
    class Data{
        private static $instancia = NULL;
        
        public static function createInstance(){
            if(!isset(self::$instancia)){//Hacemos referencia a nuestra instancia
                $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
                // Para la base de datos local
                self::$instancia = new PDO('mysql:host=127.0.0.1:3702;dbname=dbtiendatecnologiacr', 'root', '', $optionsPDO);
                //  echo "Conexion realizada";
            }
            return self::$instancia;
        }
    
    }
?>