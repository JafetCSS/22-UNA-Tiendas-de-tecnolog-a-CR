<?php

require_once 'data.php'; // allow access to data methods
class StoreRequestData extends Data{

    public function consultGetAllRawStoreRequest(){//consult all the raw store requests in the table tbproduct

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to consult all the raw store requests
        $querySelect = "SELECT * FROM tbstorerequest WHERE storerequestadminid = '0';";
        $result = mysqli_query($conn, $querySelect); //get the answer from database
        mysqli_close($conn); //close the database connection
        $storeRequestArray = [];//storage for all raw store requests
        while ($row = mysqli_fetch_array($result)){

            $storeRequest = new StoreRequest($row['storerequestid'],$row['storerequeststoreid'],"",$row['storerequestdate'],$row['storerequestadminid']);
            array_push($storeRequestArray,$storeRequest);
        }
        return $storeRequestArray;//return all the raw store requests in an array
    }
}
?>