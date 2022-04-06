<?php

if(isset($_POST['action'])){

    if(strcmp($_POST['action'],"goBack")){

        header("location: ../view/manageRawStoreRequestView.php");
    }else if(strcmp($_POST['action'],"accept")){

        
    }else if(strcmp($_POST['action'],"reject")){

        
    }
}

?>