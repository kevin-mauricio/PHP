<?php
    $parrafo = "Detalles de compra";

    if (isset($_REQUEST['boton'])) {
      $cant = $_REQUEST['cantidad'];
      $precioUnd = $_REQUEST['precio'];
      $total = 0;
      $totalDescuento = 0;

      if ($cant > 0) {
        $desc = ($cant >= 3)?0.2:0.1;
        $total = $cant * $precioUnd;
        $totalDescuento = $total - $total * $desc;
        $desc = $desc*100;
        $parrafo = "Detalles de compra<br>Cant: $cant<br>Valor und: $precioUnd<br>Descuento: $desc%<br>Subtotal: $total<br>Total: $totalDescuento";
      } else {
        $parrafo = "Detalles de compra<br>Cantidad incorrecta";
      }

/*       if ($cant >= 3) {
        $total = $cant * $precioUnd;
        $totalDescuento -= $total * 0.20;
      } else {
        $total = $cant * $precioUnd;
        $totalDescuento -= $total * 0.10; 
      } */
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camisas</title>
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
          <h1>Descuento de la compra</h1>
          <p>Calcular el descuento de la compra según la cantidad de camisas</p>
        </div>
      </div>
        <div class="d-flex justify-content-center">
          <form class="col-3 m-3" method="post">
            <p>Ingrese la información:</p>
            <div class="mb-3">
                <label for="cantidade" class="form-label">Cantidad de camisas</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad">
                <label for="precio " class="form-label">Precio por und.</label>
                <input type="number" class="form-control" name="precio" id="precio" step="0.01">
            </div>
              <button type="submit" class="btn btn-primary m-2" name= "boton">Calcular</button>
            </form>
            <div id="parrafo" class="bg-light p-3 w-25">
              <?php echo $parrafo;?>
            </div>
          </div>
    </main>
    <footer class="bg-dark mt-3 p-5 text-center">
      <p class="text-white small">Kevin Mauricio Mejía Almansa - ADSO 2558265</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>