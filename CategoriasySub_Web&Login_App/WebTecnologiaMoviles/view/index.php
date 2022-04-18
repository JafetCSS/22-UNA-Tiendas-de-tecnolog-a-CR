<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f0f2f5;
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



    <div class="row justify-content-center">
        <div class="col-sm-4 text-center">
            <h2 class="mb-4">TIENDA TECNOLOGICA DE CR</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around" id="">
            <div class="col text-center">
                <img src="../image/Technology.jpg" alt="technology" class="img-responsive" class="d-flex w-50 mr-auto ml-auto" width="850px">
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container" class="justify-content-center">

            <div class="col text-center">
                <span class="text-muted">Tienda Tecnologica CR © <script>
                        document.write(new Date().getFullYear())
                    </script> </span>
            </div>

        </div>
    </footer>
</body>

</html>