<?php
require_once '../data/accountData.php'; // allow access to accountData methods

class AccountBusiness {

    private $accountData;

    public function __construct(){

        $this->accountData = new AccountData();  
    }

    //update the state of an account by the account store id in the database
    public function changeAccountState($id){

        return $this->accountData->updateChangeAccountState($id);
    }

    //consult the account by the account store id in the database
    public function getAccountByStoreId($storeId, $account){

        return $this->accountData->consultGetAccountByStoreId($storeId, $account);
    }
}
?>