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
        <a href="/actividadesphp/crud_codeigniter/index.php/personas/listado" class="btn btn-success m-5">Listado</a>

        <div class="row">
            <div class="col-6">
            </div>
            <?php echo form_open(''); ?>
            <div class="form-group">
                <?php
                echo form_label('Nombre', 'nombre');

                $data = [
                    'name' => 'nombre',
                    'value' => $nombre,
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
                    'value' => $apellido,
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
                    'value' => $edad,
                    'class' => 'form-control input-lg',
                ];
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label for=""><b>Genero:</b></label>
                <br>
                <?php
                echo form_label('Masculino', 'genero');

                $data = [
                    'name' => 'genero',
                    'value' => 'Masculino',
                    'class' => 'form-check-input',
                    'checked' => ($genero == "Masculino" ? true : false),
                ];
                echo form_radio($data);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Femenino', 'genero');

                $data = [
                    'name' => 'genero',
                    'value' => 'Femenino',
                    'class' => 'form-check-input',
                    'checked' => ($genero == "Femenino" ? true : false),
                ];
                echo form_radio($data);
                ?>
            </div>
            <div class="form-group">
                <?php
                $options = [
                    'default' => 'Seleccione su estado civil',
                    'soltero' => 'Soltero(contento)',
                    'casado' => 'Casado(triste)',
                    'viudo' => 'Viudo(contento)',
                ];

                $selected_option = ($estado_civil == null ? 'default' : $estado_civil); // Valor que deseas seleccionar por defecto
                
                echo form_dropdown('estado_civil', $options, $selected_option);
                ?>
            </div>

            <div class="form-group">
                <h2 class="">Habilidades:</h2>
                <label for="">PHP</label>
                <?php
                $data = [
                    'name' => 'php',
                    'value' => 'si',
                    'checked' => ($php == "si" ? true : false),
                    'class' => 'form-check-input',
                ];
                echo form_checkbox($data);
                ?>
                <label for="">HTML</label>
                <?php
                $data = [
                    'name' => 'html',
                    'value' => 'si',
                    'checked' => ($html == "si" ? true : false),
                    'class' => 'form-check-input',
                ];

                echo form_checkbox($data);
                ?>
                <label for="">Python</label>
                <?php
                $data = [
                    'name' => 'python',
                    'value' => 'si',
                    'checked' => ($python == "si" ? true : false),
                    'class' => 'form-check-input',
                ];

                echo form_checkbox($data);
                ?>
                <label for="">AWS</label>
                <?php
                $data = [
                    'name' => 'aws',
                    'value' => 'si',
                    'checked' => ($aws == "si" ? true : false),
                    'class' => 'form-check-input',
                ];

                echo form_checkbox($data);
                ?>
            </div>

        </div>

        <?php
        echo form_submit('mysubmit', 'Enviar', 'class="btn btn-primary mt-3" ');
        ?>

        <?php echo form_close(); ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <!-- <script>
        function some_function() {
            console.log("funcion");
            window.location.href = '/actividadesphp/crud_codeigniter/index.php/personas/listado';
        }
    </script> -->
</body>

</html>