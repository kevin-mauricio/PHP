<?php
    $parrafo = "";
    if (isset($_REQUEST['boton'])) {
      $actividad = $_REQUEST['actividad'];
      $tiempo = $_REQUEST['tiempo'];

      if ($actividad == 'dormir') {
        $calorias = $tiempo * 1.08;
      } else {
        $calorias = $tiempo * 1.66;
      }
      $parrafo = "Calorías quemadas: ".$calorias;
    } 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calorías</title>
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
    <main class="container">
      <div class="d-flex justify-content-center text-center">
        <div>
          <h1>Contador de calorías</h1>
          <p>Calcular las calorías quemadas según la actividad realizada</p>
          <h3>Seleccione una actividad</h3>
        </div>
      </div>
        <div class="d-flex justify-content-center">
          <form class="col-3 m-3" method="post">
            <div class="mb-3">
                <label for="tiempo " class="form-label">Ingrese el tiempo</label>
                <input type="number" placeholder="minutos" class="form-control" name="tiempo" id="tiempo" step="0.01">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="actividad" id="actividad1" value="dormir">
                <label class="form-check-label" for="actividad1">
                  Dormir
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="actividad" id="actividad2" value="sentado">
                <label class="form-check-label" for="actividad2">
                  Estar sentado
                </label>
              </div>
              <button type="submit" class="btn btn-primary m-2" name= "boton">Calcular</button>
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