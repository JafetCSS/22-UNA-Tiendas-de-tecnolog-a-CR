<?php

class StoreAddress{

    private $storeAddress_id;
    private $storeAddress_mapUrl;
    private $storeAddress_province;
    private $storeAddress_canton;
    private $storeAddress_district;
    private $storeAddress_storeId;

    public function __construct($storeAddress_id, $storeAddress_mapUrl, $storeAddress_province, $storeAddress_canton, $storeAddress_district, $storeAddress_storeId){

        $this->storeAddress_id = $storeAddress_id;
        $this->storeAddress_mapUrl = $storeAddress_mapUrl;
        $this->storeAddress_province = $storeAddress_province;
        $this->storeAddress_canton = $storeAddress_canton;
        $this->storeAddress_district = $storeAddress_district;
        $this->storeAddress_storeId = $storeAddress_storeId;
    }
    
    public function setStoreAddressId($storeAddress_id){

        $this->storeAddress_id = $storeAddress_id;
    }

    public function getStoreAddressId(){

        return $this->storeAddress_id;
    }

    public function setStoreAddressMapUrl($storeAddress_mapUrl){

        $this->storeAddress_mapUrl = $storeAddress_mapUrl;
    }

    public function getStoreAddressMapUrl(){

        return $this->storeAddress_mapUrl;
    }

    public function setStoreAddressProvince($storeAddress_province){

        $this->storeAddress_province = $storeAddress_province;
    }

    public function getStoreAddressProvince(){

        return $this->storeAddress_province;
    }

    public function setStoreAddressCanton($storeAddress_canton){

        $this->storeAddress_canton = $storeAddress_canton;
    }

    public function getStoreAddressCanton(){

        return $this->storeAddress_canton;
    }

    public function setStoreAddressDistrict($storeAddress_district){

        $this->storeAddress_district = $storeAddress_district;
    }

    public function getStoreAddressDistrict(){

        return $this->storeAddress_district;
    }

    public function setStoreAddressStoreId($storeAddress_storeId){

        $this->storeAddress_storeId = $storeAddress_storeId;
    }

    public function getStoreAddressStoreId(){

        return $this->storeAddress_storeId;
    }
}
?>