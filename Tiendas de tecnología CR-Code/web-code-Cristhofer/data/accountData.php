<?php

require_once 'data.php'; // allow access to data methods
class AccountData extends Data{

    public function updateChangeAccountState($id){//update the state of an account in the table tbaccount by the account store id

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to update the state of an account
        $queryUpdate = "UPDATE tbaccount SET state = '1' WHERE typeid='".$id."'";
        $result = mysqli_query($connection, $queryUpdate);
        mysqli_close($connection);
    }
}
?>