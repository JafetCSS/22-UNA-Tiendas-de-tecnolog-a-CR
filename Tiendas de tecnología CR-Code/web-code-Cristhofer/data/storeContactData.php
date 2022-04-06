<?php

require_once 'data.php'; // allow access to data methods
class StoreContactData extends Data{

    public function consultGetAllStoreContactByStoreId($storeId){//consult all the store contacts by store id in the table tbstorecontact

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to consult all the store contacts by store id
        $querySelect = "SELECT * FROM tbstorecontact WHERE storecontactstoreid = '".$storeId."';";
        $result = mysqli_query($conn, $querySelect); //get the answer from database
        mysqli_close($conn); //close the database connection
        $storeContactArray = [];//storage for all store contacts
        while ($row = mysqli_fetch_array($result)){

            $storeContact = new StoreContact($row['storecontactid'],$row['storecontactmodality'],$row['storecontactbody'],$row['storecontactstoreid']);
            array_push($storeContactArray,$storeContact);
        }
        return $storeContactArray;//return all the store contacts in an array
    }
}
?>