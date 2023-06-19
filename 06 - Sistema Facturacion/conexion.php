<?php
$conexion = new mysqli("localhost", "root", "", "sistemafactura");

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
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al insertar proveedor: '. $e->getMessage().'</div>';
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
        header("Location: registro_producto.php");
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al registar producto: '. $e->getMessage().'</div>';
    }
    
}
