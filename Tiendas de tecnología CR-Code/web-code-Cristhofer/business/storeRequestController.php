<?php
require_once '../business/storeRequestLogic.php'; // allow access to storeRequestLogic methods
if(isset($_POST['action'])){
    
    if(strcmp($_POST['action'],"goBack") == 0){

        header("location: ../view/manageRawStoreRequestView.php");
    }else if(strcmp($_POST['action'],"accept") == 0){

        $storeId = $_POST['storeId'];
        $storeRequestLogic = new StoreRequestLogic();
        $storeRequestLogic->acceptStoreRequest($storeId);
    }else if(strcmp($_POST['action'],"reject") == 0){

        $storeId = $_POST['storeId'];
        $storeRequestLogic = new StoreRequestLogic();
        $storeRequestLogic->rejectStoreRequest($storeId);
    }
}

?>