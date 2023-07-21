<?php include("conexion.php") ?>
<?php include("includes/header.php") ?>
<?php
$ancho_span = "5.5rem";
$items_factura = array();

function agregarItem($items_factura, $id, $nombre, $precio, $cantidad, $subtotal)
{
    $indice = retornarIndex($items_factura);
    $items_factura[$indice] = array($id, $nombre, $precio, $cantidad, $subtotal);
}

function retornarIndex($items_factura): int
{
    $index = count($items_factura);
    return $index;
}
?>
<div class="container border bg-light my-5">
    <div class="row p-5">
        <div class="col-6">
            <div class="p-2 d-flex justify-content-center">
                <form action="" method="POST">
                    <select class="form-select form-select-lg mb-3" name="select_productos"
                        aria-label=".form-select-lg example">
                        <option selected>Seleccionar producto</option>
                        <?php
                        $buscar = $conexion->query("SELECT * FROM producto WHERE estado = 1 ORDER BY nombre ASC;");
                        if ($buscar->num_rows > 0) {
                            while ($row = $buscar->fetch_assoc()) {
                                $id = $row['id_producto'];
                                $nombre = $row['nombre'];
                                ?>
                                <option value="<?php echo $id ?>"><?php echo $nombre ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="submit" value="Buscar" name="buscar" class="btn btn-dark">
                    </div>
                    <?php
                    $id_producto = "";
                    $nombre = "";
                    $precio = "";
                    if (isset($_POST['buscar'])) {
                        $id_producto = $_POST['select_productos'];
                        $producto_buscado = $conexion->query("SELECT * FROM producto WHERE id_producto = $id_producto;");
                        while ($row = $producto_buscado->fetch_assoc()) {
                            $nombre = $row['nombre'];
                            $precio = $row['precio'];
                        }
                    }
                    ?>
                    <div class="input-group mb-3">
                        <span style="width:<?php echo $ancho_span ?>" class="input-group-text">ID</span>
                        <input class="form-control" type="text" name="id_producto" value="<?php echo $id_producto ?>"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span style="width:<?php echo $ancho_span ?>" class="input-group-text">Nombre</span>
                        <input class="form-control" type="text" name="nombre_producto" value="<?php echo $nombre ?>"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span style="width:<?php echo $ancho_span ?>" class="input-group-text">Precio $</span>
                        <input class="form-control" type="text" name="precio_producto" value="<?php echo $precio ?>"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span style="width:<?php echo $ancho_span ?>" class="input-group-text">Cantidad</span>
                        <input type="number" name="cantidad_producto" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="submit" value="Agregar +" name="agregar_carrito" class="btn btn-success">
                    </div>
                </form>
            </div>
            <?php
            // CLIC A AGREGAR
            if (isset($_POST['agregar_carrito'])) {
                session_unset();
                $numero_producto = 1;
                $id_producto = $_POST['id_producto'];
                $cantidad_producto = $_POST['cantidad_producto'];
                $nombre_producto = $_POST['nombre_producto'];
                $precio_producto = $_POST['precio_producto'];
                $subtotal = $precio_producto * $cantidad_producto;
                $consulta_stock = $conexion->query("SELECT stock FROM producto WHERE id_producto = $id_producto;");
                while ($row = $consulta_stock->fetch_assoc()) {
                    $stock = $row['stock'];
                }
                if ($cantidad_producto > $stock) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Error, el stock actual es: <?php echo $stock; ?>
                    </div>
                    <?php
                }
            } else {
                $numero_producto = "";
                $id_producto = "";
                $cantidad_producto = "";
                $nombre_producto = "";
                $precio_producto = "";
                $subtotal = "";
                $consulta_stock = "";
            }
            ?>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
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
                        <td><?php echo $numero_producto; ?></td>
                        <td>
                            <?php echo $id_producto; ?>
                        </td>
                        <td>
                            <?php echo $nombre_producto; ?>
                        </td>
                        <td>
                            <?php echo $precio_producto; ?>
                        </td>
                        <td>
                            <?php echo $cantidad_producto; ?>
                        </td>
                        <td>
                            <?php echo $subtotal; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-primary"
                href="facturar.php?id_producto=<?php echo $id_producto; ?>&nombre_producto=<?php echo $nombre_producto; ?>&precio_producto=<?php echo $precio_producto; ?>&cantidad_producto=<?php echo $cantidad_producto; ?>&subtotal=<?php echo $subtotal; ?>">Facturar</a>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>