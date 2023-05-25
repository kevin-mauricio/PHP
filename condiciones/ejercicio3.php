<?php
    if (isset($_REQUEST['promedio'])){
        $nota1 = $_REQUEST['nota1'];
        $nota2 = $_REQUEST['nota2'];
        $nota3 = $_REQUEST['nota3'];

        $promedio = ($nota1 + $nota2 + $nota3) / 3;

        if ($promedio >= 3.5) {
            $parrafo = "Aprueba con ".$promedio;
        } else {
            $parrafo = "No aprueba con ".round($promedio);
        }

    } else {
        $parrafo = "Ingrese las notas";
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aprueba o reprueba</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-lg bg-dark">
                    <div class="p-1">
                        <a class="navbar-brand text-white">
                        <img src="img/logo_sena.png" alt="Logo" width="60" class="d-inline-block align-text-center">
                        ADSO
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container text-center">
            <h1>¿Aprueba o no aprueba?</h1>
            <p>Calcular el promedio de tres notas</p>
            <div class="d-flex justify-content-center">
                <form class="col-3 m-3" method="post">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Nota 1</label>
                        <input type="number" class="form-control" id="input1" name="nota1" step="0.01">
                        <label for="input2" class="form-label">Nota 2</label>
                        <input type="number" class="form-control" id="input2" name="nota2" step="0.01">
                        <label for="input3" class="form-label">Nota 3</label>
                        <input type="number" class="form-control" id="input3" name="nota3" step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary m-2" name= "promedio">Promedio</button>
                    <p name="parrafo"><?php echo $parrafo; ?></p>
                </form>
            </div>
        </main>
        <footer class="bg-dark mt-3 p-5 text-center">
        <p class="text-white small">Kevin Mauricio Mejía Almansa - ADSO 2558265</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>