<?php
include_once("conexion.php");

/* $consulta_proveedor = $conexion -> query("SELECT * FROM proveedor");

while ($registro = $consulta_proveedor -> fetch_array()) {

    echo $registro['nombre'];
    echo $registro['ubicacion'];
    echo $registro['telefono'];
} */

?>
<?php include("includes/header.php") ?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Proveedores</h1>
            <p class="lead fw-normal text-white-50 mb-0">Agrega y consulta los Proveedores</p>
            <a href="consultar_proveedor.php" class="btn btn-info">Consultar</a>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row-formulario d-flex justify-content-center my-5 py-5 border">
            <div class="col-4">
                <form action="" method="POST">
                    <h1>Registar proveedor</h1>
                    <div class="mb-3">
                        <label for="inputnit" class="form-label">NIT</label>
                        <input type="text" class="form-control" id="inputnit" name="nit_proveedor" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputnombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="inputnombres" name="nombres_proveedor" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="inputubicacion" name="ubicacion_proveedor" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="inputtelefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="inputtelefono" name="telefono_proveedor"
                            pattern="[0-9]{10}" placeholder="3223332244" required>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark w-50" name="registrar_proveedor">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>

<?php include("includes/footer.php") ?>