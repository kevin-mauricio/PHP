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
                    <a href="producto.php" class="btn btn-info">Agregar</a>
                </div>
            </div>
        </header>

        <main>
            <div class="container p-4">
                <?php if(isset($_SESSION['mensaje'])): ?>
                    <div class="alert alert-<?= $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                    <?php session_unset(); endif; ?>
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
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalDetalles<?php echo $id; ?>"><i class="fa-sharp fa-solid fa-circle-info"></i></button>
    
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
                                            <!-- boton para Modificar -->
                                            <button class="btn btn-success m-1" type="button" data-bs-toggle="modal" data-bs-target="#modalModificar<?php echo $id; ?>"><i class="fa-solid fa-pen"></i></button>
    
                                            <!-- Modal para Modificar producto -->
                                            <div class="modal fade" id="modalModificar<?php echo $id; ?>" tabindex="-1" aria-labelledby="modalModificarLabel<?php echo $id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalModificarLabel<?php echo $id; ?>">Modificando producto...</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <!-- Formulario para modificar producto -->
                                                            <form action="" method="POST">
                                                                <?php $_SESSION['id_producto'] = $id; ?>
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="mb-3 col-4">
                                                                        <label class="form-label" for="inputid">Id del producto</label>
                                                                        <input type="number" class="form-control" id="inputid" value="<?php echo $id; ?>" name="id_producto" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" id="inputnombre" value="<?php echo $nombre; ?>" name="nombre_producto" required>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" value="<?php echo $descripcion; ?>" name="descripcion_producto"><?php echo $descripcion; ?></textarea>
                                                                    <label for="floatingTextarea">Descripción del producto</label>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="inputproveedor" class="form-label">Proveedor</label>
                                                                    <input type="text" class="form-control" id="inputproveedor" value="<?php echo $nombre_proveedor; ?>" name="proveedor_producto" disabled>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 col-4">
                                                                        <label for="inputcosto" class="form-label">Costo</label>
                                                                        <input type="number" class="form-control" id="inputcosto" value="<?php echo $costo; ?>" name="costo_producto" step="any" disabled>
                                                                    </div>
                                                                    <div class="mb-3 col-4">
                                                                        <label for="inputprecio" class="form-label">Precio venta</label>
                                                                        <input type="number" class="form-control" id="inputprecio" value="<?php echo $precio; ?>" name="precio_producto" step="any">
                                                                    </div>
                                                                    <div class="mb-3 col-4">
                                                                        <label for="inputstock" class="form-label">Stock</label>
                                                                        <input type="number" class="form-control" id="inputstock" value="<?php echo $stock; ?>" name="stock_producto">
                                                                    </div>
                                                                </div>
                                                                <div class="row d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-outline-dark d-flex justify-content-center col-8" name="modificar_producto">Modificar</button>   
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- boton para eliminar -->
                                            <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#modalEliminar<?php echo $id; ?>"><i class="fa-solid fa-trash"></i></button>
    
                                            <!-- Modal para eliminar producto -->
                                            <div class="modal fade" id="modalEliminar<?php echo $id; ?>" tabindex="-1" aria-labelledby="modalEliminarLabel<?php echo $id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEliminarLabel<?php echo $id; ?>">Eliminando producto...</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Eliminar este producto?</p>
                                                            <form action="" method="post">
                                                            <?php $_SESSION['id_producto'] = $id; ?>
                                                                <input type="text" value="<?php echo $nombre; ?>" name="id_producto" disabled>
                                                                <input type="submit" value="Eliminar" name="eliminar_producto">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
