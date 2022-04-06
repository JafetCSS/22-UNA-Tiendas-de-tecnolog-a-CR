<?php
require_once '../data/storeData.php'; // allow access to storeData methods

class StoreBusiness {

    private $storeData;

    public function __construct(){

        $this->storeData = new StoreData();  
    }

    //consult the store by the store id in the database
    public function getStoreById($storeId, $store){

        return $this->storeData->consultGetStoreById($storeId, $store);
    }
}
?>