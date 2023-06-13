<?php
    if (isset($_REQUEST['submit'])) {

        $valor = $_REQUEST['valor'];
        $precio = $_REQUEST['precios'];
        $comision = 0;

        if ($valor >= 10000000 && $precio == 'precioDos') {
            $comision = $valor * 0.1;
        } else if ($valor >= 10000000 && $precio == 'precioUno') { 
            $comision = $valor * 0.04;
        } else if ($valor < 10000000 && $precio == 'precioDos') { 
            $comision = $valor * 0.02;
        } else if ($valor < 10000000 && $precio == 'precioUno') { 
            $comision = $valor * 0.01;
        }

        $parrafo = "La comisión es: ".$comision;

    } else {
        $parrafo = "Ingrese los valores";
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
        <h1>Comisiones por ventas</h1>
        <p>Calcular las comisiones del vendedor según el precio de venta</p>
        <div class="d-flex justify-content-center">
          <form class="col-3 m-3 text-center" method="post">
              <div class="mb-3">
                  <label for="valor " class="form-label">Valor venta</label>
                  <input type="number" class="form-control" id="valor" name="valor">
              </div>
              <select class="form-select" name="precios">
                  <option selected>Seleccionar precios</option>
                  <option value="precioUno">Precio 1</option>
                  <option value="precioDos">Precio 2</option>
              </select>
              <button type="submit" class="btn btn-primary m-2" name= "submit">Calcular</button>
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
