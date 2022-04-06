<?php

require_once 'data.php'; // allow access to data methods
class StoreRequestData extends Data{

    public function consultGetAllRawStoreRequest(){//consult all the raw store requests in the table tbstorerequest

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

    public function updateStatusRawStoreRequest($storeId, $date, $adminId, $status){//update the status, date and adminId of the store request in the table tbstorerequest by the store id

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to update the status, date and adminId of the store request
        $queryUpdate = "UPDATE tbstorerequest SET storerequeststatus = '".$status.
        "', storerequestdate = '".$date.
        "', storerequestadminid = '".$adminId.
        "' WHERE storerequeststoreid='".$storeId."'";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
    }

    public function consultGetRawStoreRequestByStoreId($storeId, $storeRequest){//consult the raw store request by store id in the table tbstorerequest

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to consult the raw store request by store id
        $querySelect = "SELECT * FROM tbstorerequest WHERE storerequeststoreid = '".$storeId."';";
        $result = mysqli_query($conn, $querySelect); //get the answer from database
        mysqli_close($conn); //close the database connection
        while ($row = mysqli_fetch_array($result)){

            $storeRequest->setStoreRequestId($row['storerequestid']);
            $storeRequest->setStoreRequestStoreId($row['storerequeststoreid']);
            $storeRequest->setStoreRequestStatus($row['storerequeststatus']);
            $storeRequest->setStoreRequestDate($row['storerequestdate']);
            $storeRequest->setStoreRequestAdminId($row['storerequestadminid']);
        }
    }
}
?>