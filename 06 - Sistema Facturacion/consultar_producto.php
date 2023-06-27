<?php
include_once("conexion.php");
$consulta_productos = $conexion->query("SELECT * FROM producto");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Consultar Productos</title>
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
                </div>
            </div>
        </header>

        <main>
            <div class="container p-4">
                <div class="col text-center">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">VER</th>
                            <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($consulta_productos->num_rows > 0) {
                                while($row = $consulta_productos->fetch_assoc()) {
                                    $id = $row['id_producto'];
                                    $nombre = $row['nombre'];
                                    $id_proveedor = $row['id_proveedor'];
                                    $descripcion = $row['descripcion'];
                                    $costo = $row['costo'];
                                    $precio = $row['precio'];
                                    $stock = $row['stock'];
    
                                    // consultando el nombre del proveedor
                                    $consulta_proveedor = $conexion->query("SELECT nombre FROM proveedor WHERE id_proveedor = $id_proveedor");
                                    $proveedor = $consulta_proveedor->fetch_assoc();
                                    $nombre_proveedor = $proveedor['nombre'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo $precio; ?></td>
                                        <td><?php echo $stock; ?></td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalDetalles<?php echo $id; ?>">Detalles</button>
    
                                            <!-- Modal para mostrar los detalles del producto -->
                                            <div class="modal fade" id="modalDetalles<?php echo $id; ?>" tabindex="-1" aria-labelledby="modalDetallesLabel<?php echo $id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDetallesLabel<?php echo $id; ?>">Detalles del producto - <?php echo $nombre; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Nombre: <?php echo $nombre; ?></p>
                                                            <p>Id Producto: <?php echo $id; ?></p>
                                                            <p>Proveedor: <?php echo $nombre_proveedor; ?></p>
                                                            <p>Descripción: <?php echo $descripcion; ?></p>
                                                            <p>Costo: <?php echo $costo; ?></p>
                                                            <p>Precio: <?php echo $precio; ?></p>
                                                            <p>Stock: <?php echo $stock; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-success m-1" href="modificar.php?id<?=$id; ?>">Modificar</a><a class="btn btn-danger" href="">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Kevin Mauricio Mejía Almansa - ADSO</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/ca748a8320.js" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
