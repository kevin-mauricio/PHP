<?php
include_once("conexion.php");
$consulta_proveedores = $conexion->query("SELECT id_proveedor, nombre FROM proveedor");
?>
<?php include("includes/header.php") ?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Productos</h1>
            <p class="lead fw-normal text-white-50 mb-0">Agrega y consulta los Productos</p>
            <a href="consultar_producto.php" class="btn btn-info">Consultar</a>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row-formulario d-flex justify-content-center my-5 py-5 border">
            <div class="col-4">
                <form action="" method="POST">
                    <h1>Registar producto</h1>
                    <div class="mb-3">
                        <label for="inputnombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputnombre" name="nombre_producto" required>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            name="descripcion_producto"></textarea>
                        <label for="floatingTextarea">Descripción del producto</label>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example" name="proveedores" required>


                        <option selected>Seleccione el proveedor</option>
                        <?php
                        if ($consulta_proveedores->num_rows > 0) {
                            ?>
                            <?php
                            while ($row = $consulta_proveedores->fetch_assoc()) {
                                $idProveedor = $row['id_proveedor'];
                                $nombreProveedor = $row['nombre'];
                                ?>
                                <option value="<?php echo $idProveedor; ?>"><?php echo $nombreProveedor; ?></option>
                                <?php
                            }
                            ?>
                            <?php
                        } else {
                            ?>
                            <option value="null">No hay proveedores registrados</option>';
                            <?php
                        }
                        ?>
                    </select>
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="inputcosto" class="form-label">Costo</label>
                            <input type="number" class="form-control" id="inputcosto" name="costo_producto" step="any"
                                required>
                        </div>
                        <div class="mb-3 col-4">
                            <label for="inputprecio" class="form-label">Precio venta</label>
                            <input type="number" class="form-control" id="inputprecio" name="precio_producto" step="any"
                                required>
                        </div>
                        <div class="mb-3 col-4">
                            <label for="inputstock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="inputstock" name="stock_producto" required>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark w-50"
                            name="registrar_producto">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>

<?php include("includes/footer.php") ?>