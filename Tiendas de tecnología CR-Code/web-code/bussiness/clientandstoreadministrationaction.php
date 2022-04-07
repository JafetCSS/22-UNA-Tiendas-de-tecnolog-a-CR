<?php
    include_once 'clientandstoreadministrationbussiness.php';
    
    if(isset($_POST)){//Si viene algo de al
        $bussiness = new ClientAndHomeAdministrationBussiness();
        
        if(strcmp($_POST['action'], "active") == 0){
            $bussiness->active($_POST['id']);
            header("Location: ../view/clientandstoreadministration.php");
        }else{
            if(strcmp($_POST['action'], "deactive") == 0){
                $bussiness->deActive($_POST['id']);
                header("Location: ../view/clientandstoreadministration.php");
            }   
        }

    }
?>