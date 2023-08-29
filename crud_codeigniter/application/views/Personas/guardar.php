<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 m-5">
                </div>
                <?php echo form_open(''); ?>
                <div class="form-group">
                    <?php
                    echo form_label('Nombre', 'nombre');
        
                    $data = [
                        'name' => 'nombre',
                        'value' => '',
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Apellido', 'apellido');
        
                    $data = [
                        'name' => 'apellido',
                        'value' => '',
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Edad', 'edad');
        
                    $data = [
                        'name' => 'edad',
                        'type' => 'number',
                        'value' => '',
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Genero:', 'genero', 'class="mt-3 me-5"');
        
                    echo form_label('Maculino:', 'femenino', 'class="mt-3"');
                    $data = [
                        'name' => 'genero',
                        'id' => 'femenino',
                        'value' => 'F',
                        'checked' => false,
                        'style' => 'margin:10px',
                    ];
                    echo form_radio($data);
                    echo form_label('Femenino:', 'femenino', 'class="mt-3"');
                    $data = [
                        'name' => 'genero',
                        'id' => 'femenino',
                        'value' => 'F',
                        'checked' => false,
                        'style' => 'margin:10px',
                    ];
                    echo form_radio($data);
        
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Estado Civil:', 'estado_civil', 'class="mt-3 me-5"');
        
                    $opciones = [
                        'soltero' => 'Soltero',
                        'casado' => 'Casado',
                        'viudo' => 'Viudo',
                    ];
                    echo form_dropdown('estado_civil', $opciones);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Habilidades:', 'h', 'class="mt-3 me-5"');
                    echo form_label('PHP:', 'hh', 'class="mt-3"');
                    $data = [
                        'name' => 'habilidades',
                        'id' => 'php',
                        'value' => 'PHP',
                        'checked' => false,
                        'style' => 'margin:10px',
                    ];
                    echo form_checkbox($data);
        
                    echo form_label('HTML:', 'html', 'class="mt-3"');
                    $data = [
                        'name' => 'habilidades[]',
                        'id' => 'html',
                        'value' => 'HTML',
                        'checked' => false,
                        'style' => 'margin:10px',
                    ];
                    echo form_checkbox($data);
        
                    echo form_label('Python:', 'python', 'class="mt-3"');
                    $data = [
                        'name' => 'habilidades[]',
                        'id' => 'python',
                        'value' => 'python',
                        'checked' => false,
                        'style' => 'margin:10px',
                    ];
                    echo form_checkbox($data);
        
                    echo form_label('AWS:', 'aws', 'class="mt-3"');
                    $data = [
                        'name' => 'habilidades[]',
                        'id' => 'aws',
                        'value' => 'AWS',
                        'checked' => false,
                        'style' => 'margin:10px',
                    ];
                    echo form_checkbox($data);
                    ?>
                </div>
            </div>

        <?php echo form_submit('mysubmit', 'Enviar', 'class="btn btn-primary mt-3"'); ?>

        <?php echo form_close(); ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>