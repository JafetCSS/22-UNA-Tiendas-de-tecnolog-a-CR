<?php
require_once '../data/storeContactData.php'; // allow access to storeContactData methods

class StoreContactBusiness {

    private $storeContactData;

    public function __construct(){

        $this->storeContactData = new StoreContactData();  
    }

    //consult all the store contacts by the store id in the database
    public function getAllStoreContactByStoreId($storeId){

        return $this->storeContactData->consultGetAllStoreContactByStoreId($storeId);
    }
}
?>