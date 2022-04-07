<?php
    include_once 'data.php';
    include_once '../domain/account.php';

    class ClientAndHomeAdministrationData{
        public static function getUsers(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbaccount WHERE type='client' OR type='store'");
            $accounts = [];

            foreach($sql->fetchAll() as $row){
                $accounts[] = new Account($row['id'], $row['user'], $row['password'], $row['type'], $row['state']);
            }
            return $accounts;
        }

        // public static function save($budget){
        //     $connection = Data::createInstance();
        //     $sql = $connection->prepare("INSERT INTO tbrevenues_expenses(id, code, concept, amount, type) VALUES(?,?,?,?,?)");
        //     $sql-> execute(array(BudgetData::getNextID()+1, $budget->getCode(), $budget->getConcept(), $budget->getAmount(), $budget->getType()));
        // }
        // public static function delete($id){
        //     $connection = Data::createInstance();
        //     $sql = $connection->query("DELETE FROM tbrevenues_expenses WHERE id=".$id);
        //     return 1;
        // }
        public static function active($id){
            $connection = Data::createInstance();
            $sql = $connection->query("UPDATE tbaccount SET state='1' where id='".$id."'");
            return 1;
        }
        public static function deActive($id){
            $connection = Data::createInstance();
            $sql = $connection->query("UPDATE tbaccount SET state='0' where id='".$id."'");
            return 1;
        }
    }
?>