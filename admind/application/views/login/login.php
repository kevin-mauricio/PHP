<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/login/styles.css">

    <!-- logo del navegador -->
    <link rel="icon" href="<?php echo base_url() ?>/assets/dist/img/lock-solid.svg">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 w-25">
                    <img src="<?php echo base_url() ?>/assets/dist/img/img-login.avif" class="img-fluid w-100"
                        alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <?php echo form_open('Login/validar_datos'); ?>
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-facebook"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-twitter-x"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-linkedin"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <?php
                        $data = [
                            'name' => 'correo',
                            'required' => true,
                            'type' => 'email',
                            'placeholder' => 'Ingrese su correo electronico',
                            'class' => 'form-control form-control-lg',
                        ];
                        echo form_input($data);
                        ?>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <?php
                        $data = [
                            'name' => 'passw',
                            'required' => true,
                            'type' => 'password',
                            'placeholder' => 'Ingrese la contraseña',
                            'class' => 'form-control form-control-lg',
                        ];
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <?php echo form_submit('mysubmit', 'Login', 'class="btn btn-primary mt-3 btn-lg w-25"'); ?>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                href="<?php echo base_url() ?>index.php/Registrar/formularioRegistrar"
                                class="link-danger">Register</a></p>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="row mt-3">
                        <div class="col">
                            <?php
                            $alerta = $this->session->flashdata('alerta');
                            if (!empty($alerta)) {
                                ?>
                                <div class="alert alert-<?php echo $alerta['color']; ?>" role="alert">
                                    <?php echo $alerta['mensaje']; ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>
</body>

</html>