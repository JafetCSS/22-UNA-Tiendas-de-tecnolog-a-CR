<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos Humanos</title>
    <script src="https://kit.fontawesome.com/7979dba5e8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php
        // Incluimos la bussiness para llamar los metodos de obtener datos y mostrarlos en la tabla
        include_once "../bussiness/clientandstoreadministrationbussiness.php";
    ?>
</head>

<body>
    <div class="main-container">

        <h1 class="title text-center mt-5">
            Administracion de usuarios cliente y tienda
        </h1>

        <!-- Contenedor div con clase bootstrap para que la tabla sea responsive -->
        <div class="table-responsive">
            <?php
            // Instancia de la bussiness y extraccion de los datos de la consulta a base de datos para obtener los recursos humanos
            $bussiness = new ClientAndHomeAdministrationBussiness();
            $accounts = $bussiness->getUsers();
            
            if (empty($accounts)) { //Si la variable esta vacia entonces imprime mensaje en la tabla para indicar que no hay recursos humanos registrados
                echo "<p style='color:red; text-align:center'>No hay cuentas registradas aún.</p>";
            } else {
            ?>
                <!-- Inicio de tabla -->
                <table class="table table-sm table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th id="human-resource-th">id</th>
                            <!-- Las siguientes con id diferente son para cambiar si tamaño -->
                            <th id="human-resource-description">Usuario</th>
                            <th id="human-resource-th">Contraseña</th>
                            <th id="human-resource-actions">Tipo</th>
                            <th id="human-resource-actions">Estado</th>
                            <th id="human-resource-actions">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($accounts as $account) {
                        ?>
                            <tr class="table-light">
                                <td id="human-resource-col-id"><?php echo $account->getID() ?></td>
                                <td id="human-resource-col"><?php echo $account->getUser() ?></td>
                                <td id="human-resource-col"><?php echo $account->getPassword() ?></td>
                                <td id="human-resource-col"><?php echo $account->getType() ?></td>
                                <td id="human-resource-col"><?php echo $account->getState() ?></td>

                                <td id="human-resource-col">
                                    <!-- En boton de editar se usa un form para enviar los datos de la persona por medio de input hidden -->
                                    <!-- Ponemos los link dentro del form para que no se descuadre la tabla y los botones se acomoden bien -->
                                    <form action="../bussiness/clientandstoreadministrationaction.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $account->getID()  ?>">
                                        <?php
                                            if($account->getState() == 1){//Si la cuenta esta activa entonces enviamos la accion desactivar si se preciona el sunmit
                                                echo '<input type="hidden" name="action" value="deactive">';
                                                echo '<button type="submit" class="btn btn-danger">Bloquear</button>';
                                            }else{
                                                echo '<input type="hidden" name="action" value="active">';
                                                echo '<button type="submit" class="btn btn-success">Desbloquear</button>';
                                            }
                                        ?>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            <?php
            }
            ?>
        </div><!-- table-responsive-end --->

    <!-- Libreria Popper y libreria bootstrap js para ventanas emergentes y tooltips  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Ion Icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>