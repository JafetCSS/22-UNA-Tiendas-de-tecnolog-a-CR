<?php

class StoreRequest{

    private $storeRequest_id;
    private $storeRequest_storeId;
    private $storeRequest_status;
    private $storeRequest_date;
    private $storeRequest_adminId;

    public function __construct($storeRequest_id, $storeRequest_storeId, $storeRequest_status, $storeRequest_date, $storeRequest_adminId){

        $this->storeRequest_id = $storeRequest_id;
        $this->storeRequest_storeId = $storeRequest_storeId;
        $this->storeRequest_status = $storeRequest_status;
        $this->storeRequest_date = $storeRequest_date;
        $this->storeRequest_adminId = $storeRequest_adminId;
    }

    public function setStoreRequestId($storeRequest_id){

        $this->storeRequest_id = $storeRequest_id;
    }

    public function getStoreRequestId(){

        return $this->storeRequest_id;
    }

    public function setStoreRequestStoreId($storeRequest_storeId){

        $this->storeRequest_storeId = $storeRequest_storeId;
    }

    public function getStoreRequestStoreId(){

        return $this->storeRequest_storeId;
    }

    public function setStoreRequestStatus($storeRequest_status){

        $this->storeRequest_status = $storeRequest_status;
    }

    public function getStoreRequestStatus(){

        return $this->storeRequest_status;
    }

    public function setStoreRequestDate($storeRequest_date){

        $this->storeRequest_date = $storeRequest_date;
    }

    public function getStoreRequestDate(){ 

        return $this->storeRequest_date;
    }

    public function setStoreRequestAdminId($storeRequest_adminId){

        $this->storeRequest_adminId = $storeRequest_adminId;
    }

    public function getStoreRequestAdminId(){

        return $this->storeRequest_adminId;
    }

    //class methods

    public function chargeStoreRequestByStoreId(){//charge the class from database by the store id

        $storeRequestBusiness = new StoreRequestBusiness();
        $storeRequestBusiness->getRawStoreRequestByStoreId($this->getStoreRequestStoreId(), $this);
    }
}
?>