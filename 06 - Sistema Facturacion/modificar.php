<?php include("conexion.php"); ?>
<?php include("includes/header.php"); ?>
<?php 
/* sentencia para consultar la info del producto a modificar */
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = $conexion->query(
        "SELECT producto.*, proveedor.nombre AS nombre_proveedor FROM producto
        JOIN proveedor ON producto.id_proveedor = proveedor.id_proveedor
        WHERE producto.id_producto = $id;"
    );
    if($consulta->num_rows > 0) {
        while($row = $consulta->fetch_assoc()) {
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $nombre_proveedor = $row['nombre_proveedor'];
            $costo = $row['costo'];
            $precio = $row['precio'];
            $stock = $row['stock'];
        }
    }
} 
/* sentencia UPDATE */
if(isset($_POST['modificar_producto'])) {
    $id = $_GET['id'];
    $new_nombre = $_POST['nombre_producto'];
    $new_descripcion = $_POST['descripcion_producto'];
    $new_precio = $_POST['precio_producto'];
    $new_stock = $_POST['stock_producto'];
    // generar la sentencia
    $actualizar = $conexion->query(
        "UPDATE producto 
        SET nombre = '$new_nombre', descripcion = '$new_descripcion', precio = '$new_precio', stock = '$new_stock'
        WHERE id_producto = $id;"
    );
    // crear las sesiones
    $_SESSION['mensaje'] = 'Producto modificado';
    $_SESSION['mensaje_tipo'] = 'primary';
    // redireccionar
    header("Location: consultar_producto.php");
    exit();

}

?>
<div class="container">
    <div class="row p-4">
        <div class="col-6 mx-auto">
            <form action="" method="POST">
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
<?php include("includes/footer.php"); ?>