<?php
    $parrafo = '
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Clave</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Precio con descuento</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
</tbody>
</table>';

    if (isset($_REQUEST['boton'])) {
      $nombreArticulo = $_REQUEST['nombre'];
      $clave = $_REQUEST['claves'];
      $precio = $_REQUEST['precio'];
      $precioDescuento = $precio;

      if ($clave == '01') {
        $precioDescuento -= $precioDescuento * 0.1; 
      } else {
        $precioDescuento -= $precioDescuento * 0.2;
      }

      $parrafo = '
      <table class="table">
      <thead>
        <tr>
          <th scope="col">Clave</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Precio con descuento</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">'.$clave.'</th>
          <td>'.$nombreArticulo.'</td>
          <td>'.$precio.'</td>
          <td>'.$precioDescuento.'</td>
        </tr>
     </tbody>
    </table>';
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artículo</title>
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
          <h1>Detalles del artículo</h1>
          <p>Calcular el descuento del artículo según su clave</p>
        </div>
      </div>
        <div class="d-flex justify-content-center">
          <form class="col-3 m-3" method="post">
            <p>Ingrese la información:</p>
            <div class="mb-3">
                <label for="tiempo " class="form-label">Nombre del artículo</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
                <select class="form-select mt-2" name="claves">
                  <option selected>clave</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                </select>
                <label for="clave " class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio">
            </div>
              <button type="submit" class="btn btn-primary m-2" name= "boton">Imprimir</button>
            </form>
            <?php echo $parrafo;?>
          </div>
    </main>
    <footer class="bg-dark mt-3 p-5 text-center">
      <p class="text-white small">Kevin Mauricio Mejía Almansa - ADSO 2558265</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>