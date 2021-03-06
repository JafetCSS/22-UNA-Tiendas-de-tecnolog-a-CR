<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administraci&oacute;n de solicitudes de tiendas</title>
    <!-- custom css file link-->
    <link rel="stylesheet" href="../css/manageRawStoreRequestCSS.css">
    <!-- bootstrap 5.0 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- needed classes -->
    <?php
        require_once '../business/storeRequestLogic.php'; // allow access to storeRequestLogic methods
    ?>
</head>
<body>
    <!-- header section starts -->

    <?php include '../view/header/manageRawStoreRequestHeader.php';?>

    <!-- header section ends -->
    <?php

        $storeRequestLogic = new StoreRequestLogic();
        $storeRequestLogic->showAllRawStoreRequest();
    ?>
    <!-- footer section starts -->

    <?php include '../view/footer/manageRawStoreRequestFooter.php';?>

    <!-- footer section ends -->
    <!-- custom js file link -->
    <script src="../js/manageRawStoreRequestJS.js"></script>
</body>
</html>