<?php

require_once 'data.php'; // allow access to data methods
class AccountData extends Data{

    public function updateChangeAccountState($id){//update the state of an account in the table tbaccount by the account store id

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to update the state of an account
        $queryUpdate = "UPDATE tbaccount SET state = '1' WHERE typeid='".$id."'";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
    }

    public function consultGetAccountByStoreId($storeId, $account){//consult the account by store id in the table tbaccount

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to consult the account by store id
        $querySelect = "SELECT * FROM tbaccount WHERE typeid = '".$storeId."';";
        $result = mysqli_query($conn, $querySelect); //get the answer from database
        mysqli_close($conn); //close the database connection
        while ($row = mysqli_fetch_array($result)){

            $account->setAccountId($row['id']);
            $account->setAccountUsername($row['username']);
            $account->setAccountPassword($row['password']);
            $account->setAccountType($row['type']);
            $account->setAccountState($row['state']);
            $account->setAccountTypeId($row['typeid']);
        }
    }
}
?>