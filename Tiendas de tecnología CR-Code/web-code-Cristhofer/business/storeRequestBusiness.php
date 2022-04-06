<?php
require_once '../data/storeRequestData.php'; // allow access to storeRequestData methods

class StoreRequestBusiness {

    private $storeRequestData;

    public function __construct(){

        $this->storeRequestData = new StoreRequestData();  
    }

    //consult all the raw store requests into the database
    public function getAllRawStoreRequest(){

        return $this->storeRequestData->consultGetAllRawStoreRequest();
    }
}
?>