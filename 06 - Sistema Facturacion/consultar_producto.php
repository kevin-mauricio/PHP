<?php
include_once("conexion.php");
$consulta_productos = $conexion->query("SELECT * FROM producto WHERE estado = 1;");
?>
<?php include("includes/header.php") ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Productos</h1>
                    <a href="producto.php" class="btn btn-primary">Agregar</a>
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
                                            <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#modalDetalles<?php echo $id; ?>"><i class="fa-sharp fa-solid fa-circle-info"></i></button>
    
                                            <!-- Modal para mostrar los detalles del producto -->
                                            <div class="modal fade" id="modalDetalles<?php echo $id; ?>" tabindex="-1" aria-labelledby="modalDetallesLabel<?php echo $id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDetallesLabel<?php echo $id; ?>">Detalles del producto - <?php echo $nombre; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
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
                                            <a href="modificar.php?id=<?php echo $id; ?>" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="eliminar.php?id=<?php echo $id; ?>" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                            </a>
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

<?php include("includes/footer.php") ?>
