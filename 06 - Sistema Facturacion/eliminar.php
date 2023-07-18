<?php
include("conexion.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia_eliminar = $conexion->query("DELETE FROM producto WHERE id_producto = $id");

    $_SESSION['mensaje'] = 'Producto eliminado';
    $_SESSION['mensaje_tipo'] = 'danger';
    header("Location: consultar_producto.php");
    exit();
}
?>