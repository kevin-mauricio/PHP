<?php
$conexion = new mysqli("localhost", "root", "", "sistemafactura");

if (isset($_POST['registrar_proveedor'])) {

    $nombre = $_POST['nombres_proveedor'];
    $ubicacion = $_POST['ubicacion_proveedor'];
    $telefono = $_POST['telefono_proveedor'];

    if ($nombre != NULL && $ubicacion != NULL && $telefono != NULL) {
        $insertar_proveedor = $conexion -> query("CALL pr_insertar_proveedor('$nombre', '$ubicacion', '$telefono');");
        header("Location: registro_exitoso.php");
    }
}