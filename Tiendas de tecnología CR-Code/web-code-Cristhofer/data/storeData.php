<?php

require_once 'data.php'; // allow access to data methods
class StoreData extends Data{

    public function consultGetStoreById($storeId, $store){//consult the store by store id in the table tbstore

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to consult the store by store id
        $querySelect = "SELECT * FROM tbstore WHERE storeid = '".$storeId."';";
        $result = mysqli_query($conn, $querySelect); //get the answer from database
        mysqli_close($conn); //close the database connection
        while ($row = mysqli_fetch_array($result)){

            $store->setStoreId($storeId);
            $store->setStoreProfileImageUrl($row['storeprofileimageurl']);
            $store->setStoreLegalCertificate($row['storelegalcertificate']);
            $store->setStoreSchedule($row['storeschedule']);
            $store->setStoreName($row['storename']);
            $store->setStoreDescription($row['storedescription']);
            $store->setStoreQRUrl($row['storeqrurl']);
            $store->setStoreEmail($row['storeemail']);
        }
    }
}
?>