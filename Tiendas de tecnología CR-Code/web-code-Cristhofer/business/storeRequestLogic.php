<?php
require_once '../business/storeRequestBusiness.php'; // allow access to storeRequestBusiness methods
require_once '../business/accountBusiness.php'; // allow access to accountBusiness methods
require_once '../business/storeBusiness.php'; // allow access to storeBusiness methods
require_once '../business/storeContactBusiness.php'; // allow access to storeContactBusiness methods
require_once '../business/storeAddressBusiness.php'; // allow access to storeAddressBusiness methods
require_once '../domain/storeRequest.php'; // allow access to storeRequest methods
require_once '../domain/storeAddress.php'; // allow access to storeAddress methods
require_once '../domain/storeContact.php'; // allow access to storeContact methods
require_once '../domain/store.php'; // allow access to store methods
require_once '../domain/account.php'; // allow access to account methods

class StoreRequestLogic{
    
    public function __construct(){}
    
    function showAllRawStoreRequest(){

        $storeRequestBusiness = new StoreRequestBusiness();
        $storeRequestArray = $storeRequestBusiness->getAllRawStoreRequest();
        echo '<section id="manage-raw-store-request">';
        echo '<h2 id="manage-raw-store-request-title">Administraci&oacute;n de solicitudes de tiendas</h2>';
        if(count($storeRequestArray) != 0){

            echo '<div class="table-responsive">';
            echo '<form action="../business/storeRequestController.php" enctype="multipart/form-data" method="POST">';
            echo '<table class="table table-sm table-hover table-bordered align-middle text-center">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th scope="col">#</th>';
            echo '<th scope="col">Estado</th>';
            echo '<th scope="col">Acci&oacute;n</th>';
            echo '<th scope="col">Acci&oacute;n</th>';
            echo '<th scope="col">Acci&oacute;n</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach($storeRequestArray as $storeRequest){

                echo '<tr class="table-light">';
                echo '<td>'.$storeRequest->getStoreRequestId().'</td>';
                echo '<td>Sin procesar</td>';
                echo '<td><input class="btn btn-primary" type="button" id="seeAllInformationButton" value="Ver información" onclick="seeAllInformation('.$storeRequest->getStoreRequestStoreId().')" /></td>';
                echo '<td><input class="btn btn-success" type="button" id="acceptButton" value="Aceptar" onclick="acceptStoreRequest('.$storeRequest->getStoreRequestStoreId().')" /></td>';
                echo '<td><input class="btn btn-danger" type="button" id="rejectButton" value="Rechazar" onclick="rejectStoreRequest('.$storeRequest->getStoreRequestStoreId().')" /></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</form>';
            echo '</div>';
        }else{

            echo '<h1 id="no-raw-store-request">No hay solicitudes de tiendas sin procesar</h1>';
        }

        echo '</section>';
    }

    public function acceptStoreRequest($storeId){

        $adminId = 1;//this will be get with session vars lately
        $date = date('Y-m-d', time()); 
        $storeRequestBusiness = new StoreRequestBusiness();
        $storeRequestBusiness->changeStatusRawStoreRequest($storeId, $date, $adminId, "Accept");
        $accountBusiness = new AccountBusiness();
        $accountBusiness->changeAccountState($storeId);
        echo "Complete";
    }

    public function rejectStoreRequest($storeId){

        $adminId = 1;//this will be get with session vars lately
        $date = date('Y-m-d', time()); 
        $storeRequestBusiness = new StoreRequestBusiness();
        $storeRequestBusiness->changeStatusRawStoreRequest($storeId, $date, $adminId, "Reject");
        echo "Complete";
    }
    
    public function showAllInformationRawStoreRequest($storeId){

        $storeAddress = new StoreAddress(0, "", "", "", "", $storeId);
        $account = new Account(0, "", "", "", NULL, $storeId);
        $storeRequest = new StoreRequest(0, $storeId, "Sin procesar", NULL, 0);
        $store = new Store($storeId, "", 0, "", "", "", "", "", $storeAddress, NULL, $storeRequest, $account);
        $store->chargeStoreByStoreId();
        $store->showAllStoreInformation();
    }
}
