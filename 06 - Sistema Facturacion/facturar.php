<?php include("conexion.php"); ?>
<?php
if (isset($_GET['id_producto'])) {
    $idProducto = $_GET['id_producto'];
    $nombreProducto = $_GET['nombre_producto'];
    $precioProducto = $_GET['precio_producto'];
    $cantidadProducto = $_GET['cantidad_producto'];
    $subtotal = $_GET['subtotal'];
}

if (isset($_POST['btn_pagar'])) {
    $dineroRecibido = $_POST['dinero_recibido'];
    if ($dineroRecibido < $subtotal) {
        $_SESSION['mensaje'] = 'Dinero no es suficiente';
        $_SESSION['color'] = 'danger';
    } else {
        $cambio = $dineroRecibido - $subtotal;
        $_SESSION['mensaje_cambio'] = 'Compra realizada';
        $_SESSION['color'] = 'success';
    }
}

?>
<?php include("includes/header.php") ?>
<div class="container">
    <div class="row p-5">
        <?php if (isset($_POST['btn_terminar'])) {
            ?>
            <div class="d-flex justify-content-center">
                <img class="img-fluid w-50" src="assets/fondo-producto.jpg" alt="">
            </div>
            <?php
        } ?>
        <div class="col-10 bg-dark border mx-auto p-4" <?php echo (isset($_POST['btn_terminar'])) ? 'hidden' : '' ?>>
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
                            <?php echo '$' . number_format($subtotal, 0, ",", "."); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mx-5">
                <p class="text-light">TOTAL:
                    <?php echo '$' . number_format($subtotal, 0, ",", "."); ?>
                </p>
            </div>
            <form class="col-12" action="" method="POST">
                <div class="d-flex">
                    <div class="m-2">
                        <input class="form-control" type="number" name="dinero_recibido" id=""
                            placeholder="Dinero recibido">
                    </div>
                    <div class="m-2">
                        <input type="submit" value="Pagar" name="btn_pagar" class="btn btn-primary">
                    </div>
                </div>
                <?php if (isset($_SESSION['mensaje'])) {
                    ?>
                    <div class="alert alert-<?= $_SESSION['color'] ?> mt-2" role="alert">
                        <?php echo $_SESSION['mensaje']; ?>
                    </div>
                    <?php
                } else if (isset($_SESSION['mensaje_cambio'])) {
                    ?>
                        <div class="m-2 col-4">
                            <label class="text-light" for="">Dinero recibido</label>
                            <input class="form-control" type="number" value="<?php echo $dineroRecibido; ?>"
                                name="dinero_recibido" readonly>
                        </div>
                        <div class="m-2 col-4">
                            <label class="text-light" for="">Cambio</label>
                            <input class="form-control" type="number" value="<?php echo $cambio; ?>" name="campo_cambio"
                                readonly>
                        </div>
                        <div class="alert alert-<?= $_SESSION['color'] ?> mt-2" role="alert">
                        <?php echo $_SESSION['mensaje_cambio']; ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Terminar" name="btn_terminar" class="btn btn-success mx-auto">
                        </div>
                        <?php
                        /* insertando factura y los items a base de datos */
                        if (isset($_POST['btn_terminar'])) {
                            $cambio = $_POST['campo_cambio'];
                            $dineroRecibido = $_POST['dinero_recibido'];
                            $insertandoFactura = $conexion->query("INSERT INTO factura(dinero_recibido, total_facturado, cambio)
                                VAlUES ($dineroRecibido, $subtotal, $cambio);");
                            $buscandoFactura = $conexion->query("SELECT id_factura FROM factura ORDER BY id_factura DESC LIMIT 1;");
                            while ($row = $buscandoFactura->fetch_assoc()) {
                                $id_factura = $row['id_factura'];
                            }
                            $insertandoItemsFactura = $conexion->query("INSERT INTO items_factura(id_factura, id_producto, cantidad, subtotal) VALUES($id_factura, $idProducto, $cantidadProducto, $subtotal);");

                            $actualizarStock = $conexion->query("CALL actualizarStock($idProducto, $cantidadProducto);");
                        }

                    //session_unset();
                } ?>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>