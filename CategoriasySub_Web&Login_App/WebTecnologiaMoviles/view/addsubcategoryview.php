<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Subcategoria</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
    include_once "../business/categorybusiness.php";
    include_once "../business/subcategorybusiness.php";
    ?>
    <style>
        body {
            background-color: #f0f2f5;
        }

        .table-responsive {
            width: 100%;
            height: 400px;
        }

        #error_message {
            margin-bottom: 15px;
            background: #fe8b8e;
            padding: 0px;
            text-align: center;
            font-size: 14px;
            transition: all 0.5s ease;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <ul class="nav navbar-dark bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="../view/index.php">Inicio</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../view/addcategoryview.php">Gestionar Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view/addsubcategoryview.php">Gestionar Subcategorias</a>
            </li>
        </ul>

    </nav>

    <?php
    $category_business = new CategoryBusiness();
    $categories = $category_business->getAllCategory();

    $subcategorybusiness = new SubCategoryBusiness();
    $allsubcategories = $subcategorybusiness->getAllSubCategory();

    ?>


    <div class="container">

        <div class="row m-4 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">      
                        <div id="error_message">
                        </div>
                        <form id="form" onsubmit="return validate();" class="form-inline" action="../business/subcategoryaction.php" method="POST">

                            <div class="form-group">
                                <select name="category" id="category_root" class="form-control pl-0 mr-sm-3">
                                    <?php
                                    echo '<option selected disabled value="0">Categorias</option>';
                                    foreach ($categories as $category) {
                                        echo '<option value="' . $category->getIdCategory() . '">' . $category->getNameCategory() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control mr-sm-3" type="text" name="subcategory_name" id="subcategory_name" placeholder="Nombre Subcategoria">
                            </div>
                            <div class="form-group">
                                <select class="form-control pl-0 mr-sm-3" id="subcategory-status" name="subcategory">
                                    <option selected disabled value="0">Estado</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                            <button id="create-subcategory" type="submit" name="create" class="btn btn-success text-center ml-sm-3">Insertar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <table class="table table-striped table-dark  table-bordered  table-hover">
                <thead class=" thead-dark">
                    <tr>
                        <th>Subcategoria</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allsubcategories as $category) { ?>
                        <?php echo '<form action="../business/subcategoryaction.php" method="POST">'; ?>
                        <tr>
                            <input type="hidden" name="id_subcategory" value="<?php echo $category->getIdSubCategory() ?>">
                            <input type="hidden" name="id_categoryparent" value="<?php echo $category->getIdParentCategory() ?>">
                            <td><input type="text" name="category_name" class="form-control" value="<?php echo $category->getNameSubCategory() ?>"></td>

                            <td><select name="subcategory" id="subcategory" class="form-control pl-0">
                                    <option selected disabled value="estado">Estado</option>
                                    <option value="activo" <?php if (strcmp($category->getStatusSubCategory(), 'activo') == 0) {
                                                                echo "selected";
                                                            } ?>>Activo</option>
                                    <option value="inactivo" <?php if (strcmp($category->getStatusSubCategory(), 'inactivo') == 0) {
                                                                    echo "selected";
                                                                } ?>>Inactivo</option>
                                </select>
                            </td>
                            <td>
                                <input type="submit" value="Actualizar" name="update" id="update" class="btn btn-warning"/>
                                <input type="submit" value="Eliminar" name="delete" id="delete" class="btn btn-danger" />
                            </td>
                        </tr>
                        <?php echo '</form>' ?>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['message'])) {
                if (strcmp($_GET['message'], 'empty') == 0) {
                    echo "<p style='color:red'>*Campos vacios, no se puede actualizar*</p>";
                } else if (strcmp($_GET['message'], 'dberror') == 0) {
                    echo "<p style='color:red'>Error no se pudo actualizar los datos!</p>";
                } else if (strcmp($_GET['message'], 'updated') == 0) {
                    echo "<p style='color:green'>Se actualizo correctamente!</p>";
                }else if(strcmp($_GET['message'], 'error') == 0){
                    echo "<p style='color:red'>Error al obtener datos del formulario!</p>";
                }
            }
            ?>
        </div>

    </div>
    <script src="../js/addSubCategory.js"></script>
</body>

</html>