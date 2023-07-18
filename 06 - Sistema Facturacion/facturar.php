<?php include("conexion.php"); ?>
<?php
if (isset($_GET['id_producto'])) {
    /* creando la factura en la base de datos */
    $idProducto = $_GET['id_producto'];
    $nombreProducto = $_GET['nombre_producto'];
    $precioProducto = $_GET['precio_producto'];
    $cantidadProducto = $_GET['cantidad_producto'];
    $subtotal = $_GET['subtotal'];
    // Realizar las operaciones necesarias con los datos capturados

}
?>
<?php include("includes/header.php") ?>
<div class="container">
    <div class="row p-5">
        <div class="col-10 bg-dark border mx-auto p-4">
            <h1 class="text-light">Facturación ADSO</h1>
            <?php
            date_default_timezone_set('America/Bogota');
            $fechaHoraActual = date('d/m/Y H:i:s'); ?>
            <p class="text-light">Fecha:
                <?php echo $fechaHoraActual; ?>
            </p>
            <table class="table table-bordered table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col">item</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php echo $idProducto; ?>
                        </td>
                        <td>
                            <?php echo $nombreProducto; ?>
                        </td>
                        <td>
                            <?php echo $precioProducto; ?>
                        </td>
                        <td>
                            <?php echo $cantidadProducto; ?>
                        </td>
                        <td>
                            <?php echo $subtotal; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mx-5">
                <p class="text-light">TOTAL: <?php echo $subtotal?></p>
            </div>
            <form class="col-4" action="" method="post">
                <div class="d-flex">
                    <div class="m-2">
                        <input class="form-control" type="number" name="dinero_recibido" id="" placeholder="Dinero recibido">
                    </div>
                    <div class="m-2">
                        <input type="submit" value="Pagar" name="pagar" class="btn btn-light">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>