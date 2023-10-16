<?php include('includes/header.php') ?>
<?php $usuario = $this->session->userdata('usuario'); ?>
<?php $alerta = $this->session->flashdata('alerta'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Datos Personales</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- tabla de Usuarios -->
                <div class="container bg-white rounded-3 p-5 shadow-lg">
                    <!-- CONTENIDO -->
                    <div class="row justify-content-center">
                        <?php echo form_open(base_url('actualizar-datos')); ?>
                        <div class="form-group">
                            <?php
                            echo form_label('Nombre', 'nombre');
                            $data = [
                                'name' => 'nombre',
                                'required' => true,
                                'type' => 'text',
                                'value' => $usuario->nombre,
                                'min' => '0',
                                'class' => 'form-control',
                                'style' => 'width: 50vh'
                            ];
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group">
                            <h4>Rol: <span>
                                    <?php echo $usuario->rol ?>
                                </span></h4>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <h4>Correo: <span>
                                    <?php echo $usuario->correo ?>
                                </span></h4>
                            <p></p>
                        </div>
                        <div class="d-grid gap-2 text-center">
                            <?php
                            $data_sumbit = [
                                'class' => 'btn btn-primary mt-3 btn-lg w-50'
                            ];
                            echo form_submit('mysubmit', 'Actualizar', $data_sumbit);
                            ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <!-- END - CONTENIDO -->
                </div>
            </div>
        </div>
        <div class="card callapsed-card">
            <div class="card-header">
                <h3 class="card-title">Cambiar contraseña</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- tabla de Usuarios -->
                <div class="container bg-white rounded-3 p-5 shadow-lg">
                    <!-- espacio para las alertas en CAMBIAR CONTRASENA -->
                    <?php if (isset($alerta)) { ?>
                        <div class="alert alert-<?php echo $alerta['color'] ?>" role="alert">
                            <?php echo $alerta['mensaje']; ?>
                        </div>
                        <?php $this->session->set_flashdata('alerta', null); ?>
                    <?php } ?>
                    <!-- espacio para las alertas en CAMBIAR CONTRASENA -->
                    <!-- SI EL USUARIO CAMBIA LA CONTRASEÑA -->
                    <?php if (!$this->session->flashdata('pass_old')) { ?>
                        <!-- CONTENIDO -->
                        <div class="row justify-content-center">
                            <?php echo form_open(base_url('validar-contrasena')); ?>
                            <div class="form-group">
                                <?php
                                echo form_label('Contraseña Actual', 'pass_old');
                                $data = [
                                    'name' => 'pass_old',
                                    'required' => true,
                                    'type' => 'password',
                                    'class' => 'form-control input-lg',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="d-grid gap-2 text-center">
                                <?php
                                $data_sumbit = [
                                    'class' => 'btn btn-primary mt-3 btn-lg w-50'
                                ];
                                echo form_submit('mysubmit', 'Enviar', $data_sumbit);
                                ?>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- END - CONTENIDO -->
                    <?php } else { ?>
                        <div class="row justify-content-center">
                            <?php echo form_open(base_url('cambiar-contrasena')); ?>
                            <div class="form-group">
                                <?php
                                echo form_label('Nueva contraseña', 'pass_new');
                                $data = [
                                    'name' => 'pass_new',
                                    'required' => true,
                                    'type' => 'password',
                                    'class' => 'form-control input-lg',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('Confirmar contraseña', 'pass_confir');
                                $data = [
                                    'name' => 'pass_confir',
                                    'required' => true,
                                    'type' => 'password',
                                    'class' => 'form-control input-lg',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="d-grid gap-2 text-center">
                                <?php
                                $data_sumbit = [
                                    'class' => 'btn btn-primary mt-3 btn-lg w-50'
                                ];
                                echo form_submit('mysubmit', 'OK', $data_sumbit);
                                ?>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('includes/footer.php') ?>