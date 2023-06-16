<?php
include_once("conexion.php");

/* $consulta_proveedor = $conexion -> query("SELECT * FROM proveedor");

while ($registro = $consulta_proveedor -> fetch_array()) {

    echo $registro['nombre'];
    echo $registro['ubicacion'];
    echo $registro['telefono'];
} */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Facturación</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Facturación ADSO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registrar</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!"></a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="producto.php">Producto</a></li>
                                <li><a class="dropdown-item" href="proveedor.php">Proveedor</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="reporte.php">Reporte ventas</a></li>
                    </ul>
                    <form class="d-flex">
                            <button class="btn btn-outline-dark" type="submit">
                                <div class="d-flex align items-center">
                                    <i class="fa-solid fa-handshake mt-1 me-1"></i>
                                    <div>
                                        <a  class="nav-link active" href="vender.php">Vender</a>
                                    </div>
                                </div>
                            </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Proveedores</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Agrega y consulta los Proveedores</p>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                    <div class="row-formulario d-flex justify-content-center my-5">
                        <div class="col-4">
                            <form action="" method="POST">
                            <h1>Registar proveedor</h1>
                            <div class="mb-3">
                                <label for="inputnombres" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="inputnombres" name="nombres_proveedor" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" id="inputubicacion" name="ubicacion_proveedor" required>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="inputtelefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="inputtelefono" name="telefono_proveedor" pattern="[0-9]{10}" placeholder="3223332244" required>
                            </div>
                            <button type="submit" class="btn btn-outline-dark" name="registrar_proveedor">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Kevin Mauricio Mejía Almansa - ADSO</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
