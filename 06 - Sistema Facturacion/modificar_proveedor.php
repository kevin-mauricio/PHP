<?php include("conexion.php"); ?>
<?php include("includes/header.php"); ?>
<?php
/* sentencia para consultar la info del producto a modificar */
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = $conexion->query(
        "SELECT * FROM proveedor WHERE id_proveedor = $id;"
    );
    if ($consulta->num_rows > 0) {
        while ($row = $consulta->fetch_assoc()) {
            $id_proveedor = $row['id_proveedor'];
            $nit = $row['nit'];
            $nombre = $row['nombre'];
            $ubicacion = $row['ubicacion'];
            $telefono = $row['telefono'];
        }
    }
}
/* sentencia UPDATE */
if (isset($_POST['modificar_proveedor'])) {
    $id = $_GET['id'];
    $new_nombre = $_POST['nombre_proveedor'];
    $new_ubicacion = $_POST['ubicacion_proveedor'];
    $new_telefono = $_POST['telefono_proveedor'];
    // generar la sentencia
    $actualizar = $conexion->query(
        "UPDATE proveedor 
        SET nombre = '$new_nombre', ubicacion = '$new_ubicacion', telefono = '$new_telefono' WHERE id_proveedor = $id;"
    );
    // crear las sesiones
    $_SESSION['mensaje'] = 'Proveedor modificado';
    $_SESSION['mensaje_tipo'] = 'primary';
    // redireccionar
    header("Location: consultar_proveedor.php");
    exit();

}

?>
<div class="container">
    <div class="row p-4">
        <div class="col-6 mx-auto">
            <form action="" method="POST">
                <div class="row d-flex justify-content-center">
                    <div class="mb-3 col-4">
                        <label class="form-label" for="inputid">Id del proveedor</label>
                        <input type="number" class="form-control" id="inputid" value="<?php echo $id_proveedor; ?>"
                            name="id_proveedor" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nit" class="form-label">NIT</label>
                    <input type="text" class="form-control" id="nit" value="<?php echo $nit; ?>" name="nit" disabled>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="inputnombre" value="<?php echo $nombre; ?>"
                        name="nombre_proveedor" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="inputubicacion" value="<?php echo $ubicacion; ?>"
                        name="ubicacion_proveedor" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="inputtelefono" value="<?php echo $telefono; ?>"
                        name="telefono_proveedor" required>
                </div>

                <div class="row d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-dark d-flex justify-content-center col-8"
                        name="modificar_proveedor">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>