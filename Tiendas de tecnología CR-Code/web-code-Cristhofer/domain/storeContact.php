<?php

class StoreContact{

    private $storeContact_id;
    private $storeContact_modality;
    private $storeContact_body;
    private $storeContact_storeId;

    public function __construct($storeContact_id, $storeContact_modality, $storeContact_body, $storeContact_storeId){

        $this->storeContact_id = $storeContact_id;
        $this->storeContact_modality = $storeContact_modality;
        $this->storeContact_body = $storeContact_body;
        $this->storeContact_storeId = $storeContact_storeId;
    }

    public function setStoreContactId($storeContact_id){

        $this->storeContact_storeId = $storeContact_storeId;
    }

    public function getStoreContactId(){

        return $this->storeContact_storeId;
    }

    public function setStoreContactModality($storeContact_modality){

        $this->storeContact_modality = $storeContact_modality;
    }

    public function getStoreContactModality(){

        return $this->storeContact_modality;
    }

    public function setStoreContactBody($storeContact_body){

        $this->storeContact_body = $storeContact_body;
    }

    public function getStoreContactBody(){

        return $this->storeContact_body;
    }

    public function setStoreContactStoreId($storeContact_storeId){

        $this->storeContact_storeId = $storeContact_storeId;
    }

    public function getStoreContactStoreId(){

        return $this->storeContact_storeId;
    }
}
?>