<?php
require_once '../data/storeAddressData.php'; // allow access to storeAddressData methods

class StoreAddressBusiness {

    private $storeAddressData;

    public function __construct(){

        $this->storeAddressData = new StoreAddressData();  
    }

    //consult the store adress by the store id in the database
    public function getStoreAddressByStoreId($storeId, $storeAddress){

        return $this->storeAddressData->consultGetStoreAddressByStoreId($storeId, $storeAddress);
    }
}
?>