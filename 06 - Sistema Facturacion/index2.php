<?php include("includes/header.php") ?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Sistema de facturación</h1>
            <p class="lead fw-normal text-white-50 mb-0">Registro productos, proveedores y venta de productos</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <?php $numero = rand(1, 2); ?>
            <img src="assets/img_aleatorias/fondo<?php echo $numero; ?>.jpg" class="img-fluid" alt="...">
        </div>
    </div>
</section>
<?php include("includes/footer.php") ?>