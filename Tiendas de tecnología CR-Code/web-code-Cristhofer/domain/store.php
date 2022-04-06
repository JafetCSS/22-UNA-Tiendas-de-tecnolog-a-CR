<?php

class Store{

    private $store_id;
    private $store_profileImageUrl;
    private $store_legalCertificate;
    private $store_schedule;
    private $store_name;
    private $store_description;
    private $store_QRUrl;
    private $store_email;

    private $store_address;
    private $store_contactList;
    private $store_request;

    public function __construct($store_id, $store_profileImageUrl, $store_legalCertificate, $store_schedule, $store_name, $store_description, $store_QRUrl, $store_email, $store_address, $store_contactList, $store_request){

        $this->store_id = $store_id;
        $this->store_profileImageUrl = $store_profileImageUrl;
        $this->store_legalCertificate = $store_legalCertificate;
        $this->store_schedule = $store_schedule;
        $this->store_name = $store_name;
        $this->store_description = $store_description;
        $this->store_QRUrl = $store_QRUrl;
        $this->store_email = $store_email;

        $this->store_address = $store_address;
        $this->store_contactList = $store_contactList;
        $this->store_request = $store_request;
    }

    public function setStoreId($store_id){

        $this->store_id = $store_id;
    }

    public function getStoreId(){

        return $this->store_id;
    }

    public function setStoreProfileImageUrl($store_profileImageUrl){

        $this->store_profileImageUrl = $store_profileImageUrl;
    }

    public function getStoreProfileImageUrl(){

        return $this->store_profileImageUrl;
    }

    public function setStoreLegalCertificate($store_legalCertificate){

        $this->store_legalCertificate = $store_legalCertificate;
    }

    public function getStoreLegalCertificate(){

        return $this->store_legalCertificate;
    }

    public function setStoreschedule($store_schedule){

        $this->store_schedule = $store_schedule;
    }

    public function getStoreSchedule(){

        return $this->store_schedule;
    }

    public function setStoreName($store_name){

        $this->store_name = $store_name;
    }

    public function getStoreName(){

        return $this->store_name;
    }

    public function setStoreDescription($store_description){

        $this->store_description = $store_description;
    }

    public function getStoreDescription(){

        return $this->store_description;
    }

    public function setStoreQRUrl($store_QRUrl){

        $this->store_QRUrl = $store_QRUrl;
    }

    public function getStoreQRUrl(){

        return $this->store_QRUrl;
    }

    public function setEmail($store_email){

        $this->store_email = $store_email;
    }

    public function getEmail(){

        return $this->store_email;
    }

    public function setStoreAddress($store_address){

        $this->store_address = $store_address;
    }

    public function getStoreAddress(){

        return $this->store_address;
    }

    public function setStoreContactList($store_contactlist){

        $this->store_contactlist = $store_contactlist;
    }

    public function getStoreContactList(){

        return $this->store_contactlist;
    }

    public function setStoreRequest($store_request){

        $this->store_request = $store_request;
    }

    public function getStoreRequest(){

        return $this->store_request;
    }
}
?>