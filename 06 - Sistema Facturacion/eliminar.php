<?php
include("conexion.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    /* No se puede eliminar porque en la tabla items_factura id_producto es Foreign Key */
    //$sentencia_eliminar = $conexion->query("DELETE FROM producto WHERE id_producto = $id");
    $cambiandoEstado = $conexion->query("UPDATE producto SET estado = 0 WHERE id_producto = $id;");

    $_SESSION['mensaje'] = 'Producto eliminado';
    $_SESSION['mensaje_tipo'] = 'danger';
    header("Location: consultar_producto.php");
    exit();
}
?>