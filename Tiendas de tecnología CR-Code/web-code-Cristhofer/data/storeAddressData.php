<?php

require_once 'data.php'; // allow access to data methods
class StoreAddressData extends Data{

    public function consultGetStoreAddressByStoreId($storeId, $storeAddress){//consult the store address by store id in the table tbstoreaddress

        //start connection to the database
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //prepare the statement to consult the store address by store id
        $querySelect = "SELECT * FROM tbstoreaddress WHERE storeaddressstoreid = '".$storeId."';";
        $result = mysqli_query($conn, $querySelect); //get the answer from database
        mysqli_close($conn); //close the database connection
        while ($row = mysqli_fetch_array($result)){

            $storeAddress->setStoreAddressId($row['storeaddressid']);
            $storeAddress->setStoreAddressMapUrl($row['storeaddressmapurl']);
            $storeAddress->setStoreAddressProvince($row['storeaddressprovince']);
            $storeAddress->setStoreAddressCanton($row['storeaddresscanton']);
            $storeAddress->setStoreAddressDistrict($row['storeaddressdistrict']);
            $storeAddress->setStoreAddressStoreId($row['storeaddressstoreid']);
        }
    }

}
?>