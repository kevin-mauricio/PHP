<?php
include_once("conexion.php");
$consulta_proveedores = $conexion->query("SELECT * FROM proveedor WHERE estado = 1;");
?>
<?php include("includes/header.php") ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Proveedores</h1>
                    <a href="proveedor.php" class="btn btn-primary">Agregar</a>
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
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col" class="text-center">INFO</th>
                            <th scope="col" class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($consulta_proveedores->num_rows > 0) {
                                while($row = $consulta_proveedores->fetch_assoc()) {
                                    $id_proveedor = $row['id_proveedor'];
                                    $nit = $row['nit'];
                                    $nombre = $row['nombre'];
                                    $ubicacion = $row['ubicacion'];
                                    $telefono = $row['telefono'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $id_proveedor; ?></th>
                                        <td><?php echo $nombre; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#modalDetalles<?php echo $id_proveedor; ?>"><i class="fa-sharp fa-solid fa-circle-info"></i></button>
    
                                            <!-- Modal para mostrar los detalles del producto -->
                                            <div class="modal fade" id="modalDetalles<?php echo $id_proveedor; ?>" tabindex="-1" aria-labelledby="modalDetallesLabel<?php echo $id_proveedor; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDetallesLabel<?php echo $id_proveedor; ?>">Detalles del proveedor - <?php echo $nombre; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <p>ID proveedor: <?php echo $id_proveedor; ?></p>
                                                            <p>Nit: <?php echo $nit; ?></p>
                                                            <p>Nombre: <?php echo $nombre; ?></p>
                                                            <p>Ubicación: <?php echo $ubicacion; ?></p>
                                                            <p>Telefóno: <?php echo $telefono; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center" >
                                            <a href="modificar_proveedor.php?id=<?php echo $id_proveedor; ?>" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="eliminar_proveedor.php?id=<?php echo $id_proveedor; ?>" class="btn btn-danger">
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
