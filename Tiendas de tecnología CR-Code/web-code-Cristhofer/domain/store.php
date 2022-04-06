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
    private $store_account;

    public function __construct($store_id, $store_profileImageUrl, $store_legalCertificate, $store_schedule, $store_name, $store_description, $store_QRUrl, $store_email, $store_address, $store_contactList, $store_request, $store_account){

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
        $this->store_account = $store_account;
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

    public function setStoreSchedule($store_schedule){

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

    public function setStoreEmail($store_email){

        $this->store_email = $store_email;
    }

    public function getStoreEmail(){

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

    public function setStoreAccount($store_account){

        $this->store_account = $store_account;
    }

    public function getStoreAccount(){

        return $this->store_account;
    }
    //class methods

    public function chargeStoreByStoreId(){//charge the class from database by the store id

        $storeBusiness = new StoreBusiness();
        $storeBusiness->getStoreById($this->getStoreId(), $this);
        $this->getStoreAddress()->chargeStoreAddressByStoreId();
        $this->getStoreAccount()->chargeAccountByStoreId();
        $this->getStoreRequest()->chargeStoreRequestByStoreId();
        $storeContactBusiness = new StoreContactBusiness();
        $this->setStoreContactList($storeContactBusiness->getAllStoreContactByStoreId($this->getStoreId()));
    }

    public function showAllStoreInformation(){

        echo '<section id="manage-raw-store-request">';
        echo '<h2 id="manage-raw-store-request-information-title">Administraci&oacute;n de solicitudes de tiendas<br></h2>';
        echo '<br>';
        echo '<h3 id="manage-raw-store-request-information-store-name">'.$this->getStoreName().'<br></h3>';
        echo '<img id="manage-raw-store-request-information-store-profile-image" src="'.$this->getStoreProfileImageUrl().'"><br>';
        echo '<h4 id="manage-raw-store-request-information-store-legal-certificate"><span>Cédula Jurídica</span><br>'.$this->getStoreLegalCertificate().'<br></h4>';
        echo '<h4 id="manage-raw-store-request-information-store-schedule"><span>Horario</span><br>'.$this->getStoreSchedule().'<br></h4>';
        echo '<h4 id="manage-raw-store-request-information-store-description"><span>Descripción</span><br>'.$this->getStoreDescription().'<br></h4>';
        echo '<h4 id="manage-raw-store-request-information-store-qr-title"><span>Código QR</span></h4>';
        echo '<img id="manage-raw-store-request-information-store-qr" src="'.$this->getStoreQRUrl().'"><br>';
        echo '<h4 id="manage-raw-store-request-information-store-email"><span>Correo</span><br>'.$this->getStoreEmail().'<br></h4>';
        echo '<br>';
        echo '<h4 id="manage-raw-store-request-information-store-address"><span>Dirección</span><br>Provincia: '.$this->getStoreAddress()->getStoreAddressProvince().
        '<br>Canton: '.$this->getStoreAddress()->getStoreAddressCanton().
        '<br>Distrito: '.$this->getStoreAddress()->getStoreAddressDistrict().
        '<br></h4>';
        echo '<div id="manage-raw-store-request-information-store-address-map-location"><iframe src="'.$this->getStoreAddress()->getStoreAddressMapUrl().'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>';
        echo '<h4 id="manage-raw-store-request-information-store-contacts-title"><span>Contactos</span><br></h4>';
        echo '<br>';
        foreach($this->getStoreContactList() as $storeContact){

            echo '<h5 id="manage-raw-store-request-information-store-contact"><span>'.$storeContact->getStoreContactModality().': </span>'.$storeContact->getStoreContactBody().'<br></h5>';
        }
        echo '<br>';
        echo '<div id="manage-raw-store-request-information-store-manage-buttons">';
        echo '<input class="btn btn-primary" type="button" id="goBack" value="Volver" onclick="goBack()" />';
        echo '<input class="btn btn-success" type="button" id="acceptButton" value="Aceptar" onclick="acceptStoreRequest('.$this->getStoreId().')"/>';
        echo '<input class="btn btn-danger" type="button" id="rejectButton" value="Rechazar" onclick="rejectStoreRequest('.$this->getStoreId().')"/>';
        echo '</div>';
        echo '</section>';
    }
}
?>