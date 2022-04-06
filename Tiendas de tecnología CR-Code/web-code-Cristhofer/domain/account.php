<?php

class Account{

    private $account_id;
    private $account_username;
    private $account_password;
    private $account_type;
    private $account_state;
    private $account_typeId;

    public function __construct($account_id, $account_username, $account_password, $account_type, $account_state, $account_typeId){

        $this->account_id = $account_id;
        $this->account_username = $account_username;
        $this->account_password = $account_password;
        $this->account_type = $account_type;
        $this->account_state = $account_state;
        $this->account_typeId = $account_typeId;
    }
    
    public function setAccountId($account_id) {

        $this->account_id = $account_id;
    }

    public function getAccountId() {

        return $this->account_id;
    }

    public function setAccountUsername($account_username) {

        $this->account_username = $account_username;
    }

    public function getAccountUsername() {

        return $this->account_username;
    }

    public function setAccountPassword($account_password) {

        $this->account_password = $account_password;
    }

    public function getAccountPassword() {

        return $this->account_password;
    }

    public function setAccountType($account_type) {

        $this->account_type = $account_type;
    }

    public function getAccountType() {

        return $this->account_type;
    }

    public function setAccountState($account_state){

        $this->account_state = $account_state;
    }

    public function getAccountState() {

        return $this->account_state;
    }

    public function setAccountTypeId($account_typeId){

        return $this->account_typeId = $account_typeId;
    }

    public function getAccountTypeId() {

        return $this->account_typeId;
    }

    //class methods 

    public function chargeAccountByStoreId(){//charge the class from database by the store id

        $accountBusiness = new AccountBusiness();
        $accountBusiness->getAccountByStoreId($this->getAccountTypeId(), $this);
    }
}
?>