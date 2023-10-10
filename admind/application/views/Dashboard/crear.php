<?php include('includes/header.php') ?>
<div class="container bg-whiterounded-3 p-5 rounded-3 shadow-lg p-5 my-5">
        <div class="row">
            <?php echo form_open('Dashboard/crear_usuario'); ?>
            <div class="col-6 mx-auto">
                <div class="form-group">
                    <?php
                    echo form_label('Nombre', 'nombre');
                    $data = [
                        'name' => 'nombre',
                        'required' => true,
                        'type' => 'text',
                        'value' => $nombre,
                        'min' => '0',
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
                <div class="d-grid gap-2">
                    <?php echo form_submit('mysubmit', 'Enviar', 'class="btn btn-primary mt-3 btn-lg"'); ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>