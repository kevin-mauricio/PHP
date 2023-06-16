<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Facturación</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .fondo{
                background-image: url('assets/fondo-registro-desenfocado.png');
                background-repeat: no-repeat; /* Evita que se repita la imagen en el fondo */
                background-size: cover; /* Ajusta la imagen para que cubra todo el fondo */
            }
        </style>
    </head>
    <body class="fondo">
        <!-- modal confirmando el registro (proveedor y producto) -->
        <form action="" method="post">
            <div class="card mx-auto" style="width: 30rem; margin-top: 35vh;">
                <div class="card-body text-center">
                    <h5 class="card-title"></h5>
                    <p class="card-text">¡Registro éxitoso!</p>
                    <a href="index.php" class="btn btn-primary">Continuar</a>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
if (isset($_POST['confirmar-registro'])) {
    header("Location: index.php");
}
