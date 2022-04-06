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

    //update the raw store request by the store id in the database
    public function changeStatusRawStoreRequest($storeId, $date, $adminId, $status){

        return $this->storeRequestData->updateStatusRawStoreRequest($storeId, $date, $adminId, $status);
    }

    //consult the raw store request by the store id in the database
    public function getRawStoreRequestByStoreId($storeId, $storeRequest){

        return $this->storeRequestData->consultGetRawStoreRequestByStoreId($storeId, $storeRequest);
    }
}
?>