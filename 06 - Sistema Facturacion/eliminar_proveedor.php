<?php
include("conexion.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $cambiandoEstado = $conexion->query("UPDATE proveedor SET estado = 0 WHERE id_proveedor = $id;");

    $_SESSION['mensaje'] = 'Proveedor eliminado';
    $_SESSION['mensaje_tipo'] = 'danger';
    header("Location: consultar_proveedor.php");
    exit();
}
?>