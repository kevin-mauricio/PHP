<?php include("conexion.php") ?>
<?php
if (isset($_POST['btn_ingresar'])) {
    $correoIngresado = $_POST['correo_ingresado'];
    $contraseniaIngresada = $_POST['contrasenia_ingresada'];

    $consultarCredenciales = $conexion->query("SELECT count(*), correo_usuario, contrasenia_usuario FROM usuario WHERE correo_usuario LIKE '$correoIngresado';");
    if ($consultarCredenciales->num_rows > 0) {
        while ($row = $consultarCredenciales->fetch_assoc()) {
            $correo = $row['correo_usuario'];
            $contra = $row['contrasenia_usuario'];
        }
        $correoCoincide = strcmp($correoIngresado, $correo);
        $contraConincide = strcmp($contraseniaIngresada, $contra);
        if ($correoCoincide == 0 && $contraConincide == 0) {
            header("Location: index.php");
            exit();
        } else if ($correo == null) {
            $_SESSION['mensaje'] = 'El correo no existe, por favor registrarse';
        } else {
            $_SESSION['mensaje'] = 'Correo o contraseña incorrecta';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/login.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col p-5">
                <section class="vh-100">
                    <div class="container-fluid h-custom">
                        <div class="col-md-9 col-lg-6 col-xl-5 mx-auto w-50 p-2">
                            <h1>Ingreso Facturación ADSO</h1>
                        </div>
                        <?php
                        if (isset($_SESSION['mensaje'])) {
                            ?>
                            <div>
                                <p>
                                    <?php echo $_SESSION['mensaje']; ?>
                                </p>
                            </div>
                            <?php
                            session_unset();
                        }
                        ?>
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="assets/login.png" class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form method="POST">
                                    <div
                                        class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                        <p class="lead fw-normal mb-0 me-3">Ingresar con</p>
                                        <button type="button" class="btn btn-dark btn-floating mx-1">
                                            <i class="fa-brands fa-google"></i>
                                        </button>

                                        <button type="button" class="btn btn-dark btn-floating mx-1">
                                            <i class="fa-brands fa-github"></i>
                                        </button>
                                    </div>

                                    <div class="divider d-flex align-items-center my-4">
                                        <p class="text-center fw-bold mx-3 mb-0">O</p>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="correo_ingresado" id="form3Example3"
                                            class="form-control form-control-lg" placeholder="Ingresa un correo válido"
                                            required />
                                        <label class="form-label" for="form3Example3">Email</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <input type="password" name="contrasenia_ingresada" id="form3Example4"
                                            class="form-control form-control-lg" placeholder="Ingresa la contraseña"
                                            required />
                                        <label class="form-label" for="form3Example4">Contraseña</label>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">
                                                Recordar
                                            </label>
                                        </div>
                                        <a href="#!" class="text-body">¿Olvidaste la contraseña?</a>
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" name="btn_ingresar" class="btn btn-dark btn-lg"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Ingresar</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes cuenta aún? <a href="#!"
                                                class="link-danger">Registrarse</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php") ?>