<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "sistemafactura");
mysqli_set_charset($conexion, "utf8mb4");


// insertando proveedores...
if (isset($_POST['registrar_proveedor'])) {
    $nit = $_POST['nit_proveedor'];
    $nombre = $_POST['nombres_proveedor'];
    $ubicacion = $_POST['ubicacion_proveedor'];
    $telefono = $_POST['telefono_proveedor'];

    try {
        $insertar_proveedor = $conexion->query(
            "INSERT INTO proveedor(nit, nombre, ubicacion, telefono) 
            VALUES ('$nit', '$nombre', '$ubicacion', '$telefono');"
        );
        header("Location: registro_proveedor.php");
        exit();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al insertar proveedor: ' . $e->getMessage() . '</div>';
    }
}

// insertando productos
if (isset($_POST['registrar_producto'])) {
    $nombre = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion_producto']; // insertar en tabla producto-proveedor
    $proveedor = $_POST['proveedores'];
    $costo = $_POST['costo_producto'];
    $precio = $_POST['precio_producto'];
    $stock = $_POST['stock_producto'];

    try {
        $insertar_producto = $conexion->query(
            "INSERT INTO producto(nombre, id_proveedor, descripcion, costo, precio, stock)
            VALUES ('$nombre', '$proveedor', '$descripcion', '$costo', '$precio', '$stock');"
        );
        $_SESSION['mensaje'] = 'Producto agregado';
        $_SESSION['mensaje_tipo'] = 'success';

        header("Location: registro_producto.php");
        exit();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al registar producto: ' . $e->getMessage() . '</div>';
    }

}

if (isset($_POST['btn_terminar'])) {
    echo '<div role="alert" class="alert alert-success">Proceso finalizado</div>';
}

if (isset($_GET['idestado'])) {
    $id = $_GET['idestado'];
    $status = $_GET['estado'];
    if ($status == 'activo') {
        $actualizandoEstadoFactura = $conexion->query("UPDATE factura SET estado_factura = 0 WHERE id_factura = $id;");
    } else {
        $actualizandoEstadoFactura = $conexion->query("UPDATE factura SET estado_factura = 1 WHERE id_factura = $id;");
    }
    header("Location: reporte.php");
    exit();
}
