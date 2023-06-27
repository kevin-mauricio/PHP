<?php
include_once("conexion.php");
$consulta_proveedores = $conexion->query("SELECT id_proveedor, nombre FROM proveedor");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro de productos</title>
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
                    <h1 class="display-4 fw-bolder">Productos</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Agrega y consulta los Productos</p>
                    <a href="consultar_producto.php" class="btn btn-info">Consultar</a>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                    <div class="row-formulario d-flex justify-content-center my-5">
                        <div class="col-4">
                            <form action="" method="POST">
                            <h1>Registar producto</h1>
                            <div class="mb-3">
                                <label for="inputnombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="inputnombre" name="nombre_producto" required>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_producto"></textarea>
                                <label for="floatingTextarea">Descripción del producto</label>
                            </div>
                            <select class="form-select mb-3" aria-label="Default select example" name="proveedores" required>


                                <option selected>Seleccione el proveedor</option>
                                <?php
                                if ($consulta_proveedores->num_rows > 0) {
                                    ?>
                                        <?php
                                        while ($row = $consulta_proveedores->fetch_assoc()) {
                                            $idProveedor = $row['id_proveedor'];
                                            $nombreProveedor = $row['nombre'];
                                            ?>
                                            <option value="<?php echo $idProveedor; ?>"><?php echo $nombreProveedor; ?></option>
                                            <?php
                                        }
                                        ?>
                                    <?php
                                } else {
                                    ?>
                                    <option value="null">No hay proveedores registrados</option>';
                                    <?php
                                }
                                ?>
                            </select>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="inputcosto" class="form-label">Costo</label>
                                    <input type="number" class="form-control" id="inputcosto" name="costo_producto" step="any" required>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="inputprecio" class="form-label">Precio venta</label>
                                    <input type="number" class="form-control" id="inputprecio" name="precio_producto" step="any" required>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="inputstock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="inputstock" name="stock_producto" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-dark d-flex justify-content-center" name="registrar_producto">Registrar</button>
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
