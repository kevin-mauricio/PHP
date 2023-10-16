<?php include('includes/header.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registrar Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Registrar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registrar Usuario</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <!--           <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button> -->
                </div>
            </div>
            <div class="card-body">
                <!-- tabla de Usuarios -->
                <div class="container bg-white rounded-3 p-5 shadow-lg">
                    <!-- CONTENIDO -->
                    <div class="row justify-content-center">
                        <?php echo form_open(base_url('crear-usuario')); ?>
                        <div class="form-group">
                            <?php
                            echo form_label('Nombre', 'nombre');
                            $data = [
                                'name' => 'nombre',
                                'required' => true,
                                'type' => 'text',
                                'value' => $nombre,
                                'min' => '0',
                                'class' => 'form-control',
                                'style' => 'width: 50vh'
                            ];
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $select_option = [
                                'default' => 'rol',
                                'admin' => 'admin',
                                'cajero' => 'cajero'
                            ];
                            $data = [
                                'name' => 'rol',
                                'class' => 'bg-light border',
                                'style' => 'width: 50vh; height: 5vh'
                            ];
                            $selected_option = 'default'; // Valor que deseas seleccionar por defecto
                            echo form_dropdown('rol', $select_option, $selected_option, $data);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Email', 'email');
                            $data = [
                                'name' => 'email',
                                'required' => true,
                                'type' => 'email',
                                'value' => $correo,
                                'class' => 'form-control input-lg',
                            ];
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Password', 'passw');
                            $data = [
                                'name' => 'passw',
                                'required' => true,
                                'type' => 'password',
                                'value' => $passw,
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
                            echo form_submit('mysubmit', 'Registrar', $data_sumbit);
                            ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- END - CONTENIDO -->
            </div>
        </div>
    </section>
</div>
<?php include('includes/footer.php') ?>