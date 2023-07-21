<?php include("conexion.php") ?>
<?php include("includes/header.php") ?>
<?php
$inicio = '';
$fin = '';
if (isset($_POST['fecha_inicio'])) {
    $inicio = $_POST['fecha_inicio'];
    $fin = $_POST['fecha_fin'];
    $buscandoFacturas = $conexion->query("SELECT * FROM factura WHERE DATE(fecha) BETWEEN '$inicio' AND '$fin';");
    $sumaTotales = $conexion->query("SELECT SUM(total_facturado) FROM factura WHERE estado_factura = 1;");
    $resultado = $sumaTotales->fetch_column();
} else {
    $buscandoFacturas = $conexion->query("SELECT * FROM factura;");
    $sumaTotales = $conexion->query("SELECT SUM(total_facturado) FROM factura WHERE estado_factura = 1;");
    $resultado = $sumaTotales->fetch_column();
    $inicio = '';
}
$_SESSION['mensaje'] ="Desde: $inicio - Hasta: $fin";


?>
<div class="container">
    <div class="row pt-4">
        <div class="col bg-dark text-light d-flex justify-content-center align-items-center">
            <p>Total de todas las facturas:
                <?php echo '$ ' . number_format($resultado, 0, ",", "."); ?>
            </p>
        </div>
        <div class="col border">
            <p>Filtrar por fechas:</p>
            <form class="col" action="" method="POST">
                <div class="col d-flex">
                    <div class="col">
                        <label for="fecha">Desde:</label>
                        <input class="" type="date" id="fecha" name="fecha_inicio">
                    </div>
                    <div class="col">
                        <label for="fecha">Hasta:</label>
                        <input type="date" id="fecha" name="fecha_fin" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col d-flex justify-content-center my-1">
                    <input class="btn btn-dark" type="submit" value="Filtrar" name="btn_filtrar">
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SESSION['mensaje']) {
        ?>
        <div class="row">
            <p><?php echo $_SESSION['mensaje']; ?></p>
        </div>
        <?php
        session_unset();
    } ?>
    <div class="row p-3">
        <div class="col text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID FACTURA</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">DINERO RECIBIDO</th>
                        <th scope="col">TOTAL FACTURADO</th>
                        <th scope="col">CAMBIO</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $buscandoFacturas->fetch_assoc()) {
                        $idFactura = $row['id_factura'];
                        $dineroRecibido = $row['dinero_recibido'];
                        $totalFacturado = $row['total_facturado'];
                        $cambio = $row['cambio'];
                        $fecha = $row['fecha'];
                        $estado = $row['estado_factura'];
                        $productosFactura = $conexion->query("SELECT items_factura.id_producto, producto.nombre AS nombre FROM items_factura JOIN producto ON producto.id_producto = items_factura.id_producto WHERE items_factura.id_factura = $idFactura;")
                            ?>
                        <tr>
                            <td>
                                <?php echo $idFactura; ?>
                            </td>
                            <td>
                                <?php
                                while ($fila = $productosFactura->fetch_assoc()) {
                                    $producto = $fila['nombre'];
                                    echo $producto . "<br>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $dineroRecibido; ?>
                            </td>
                            <td>
                                <?php echo $totalFacturado; ?>
                            </td>
                            <td>
                                <?php echo $cambio; ?>
                            </td>
                            <td>
                                <?php echo $fecha; ?>
                            </td>
                            <td>
                                <?php if ($estado == 0) {
                                    ?>
                                    <a href="conexion.php?idestado=<?php echo $idFactura; ?>&estado=inactivo" class="btn btn-danger" style="width: 100px">
                                        Inactivo
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="conexion.php?idestado=<?php echo $idFactura; ?>&estado=activo" class="btn btn-success" style="width: 100px">
                                        Activo
                                    </a>

                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include("includes/footer.php") ?>