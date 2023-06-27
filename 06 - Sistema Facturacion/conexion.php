<?php
    session_start();
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
        exit();
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
        $_SESSION['mensaje'] = 'Producto agregado';
        $_SESSION['mensaje_tipo'] = 'success';

        header("Location: registro_producto.php");
        exit();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al registar producto: '. $e->getMessage().'</div>';
    }
    
}

// eliminando producto por id
if (isset($_POST['eliminar_producto'])) {
    $id_producto = $_SESSION['id_producto'];
    $eliminar_producto = $conexion->query("DELETE FROM producto WHERE id_producto = $id_producto");

    $_SESSION['mensaje'] = 'Producto eliminado';
    $_SESSION['mensaje_tipo'] = 'danger';
    
    header("Location: consultar_producto.php");
    exit();

}

// modificando el producto por id
if(isset($_POST['modificar_producto'])) {
    $id_producto = $_SESSION['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $precio_producto = $_POST['precio_producto'];
    $stock_producto = $_POST['stock_producto'];

    $modificar_producto = $conexion->query(
        "UPDATE producto SET 
        nombre = '$nombre_producto',
        descripcion = '$descripcion_producto',
        precio = $precio_producto,
        stock = $stock_producto
        WHERE id_producto = $id_producto"
    );

    $_SESSION['mensaje'] = 'Producto modificado';
    $_SESSION['mensaje_tipo'] = 'primary';

    header("Location: consultar_producto.php");
    exit();
}
