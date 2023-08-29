<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Listado</title>
    </head>

    <body>

        <div class="container">
            <!-- [ boton crear persona ] -->
            <a href="guardar" class="btn btn-success m-5">Guardar persona</a>
            <!-- [ tabla de personas ] -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col-1">#</th>
                        <th scope="col" class="col-auto">Nombres</th>
                        <th scope="col" class="col-auto">Apellidos</th>
                        <th scope="col" class="col-1">Edad</th>
                        <th scope="col" class="col-1">PHP</th>
                        <th scope="col" class="col-1">HTML</th>
                        <th scope="col" class="col-1">Python</th>
                        <th scope="col" class="col-1">AWS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $key => $persona): ?>
                    <tr>
                        <th scope="row"><?php echo $persona->persona_id ?></th>
                        <td><?php echo $persona->nombre ?></td>
                        <td><?php echo $persona->apellido ?></td>
                        <td><?php echo $persona->edad ?></td>
                        <td><?php echo ($persona->php == null? "no": "si") ?></td>
                        <td><?php echo ($persona->html == null? "no": "si") ?></td>
                        <td><?php echo ($persona->python == null? "no": "si") ?></td>
                        <td><?php echo ($persona->aws == null? "no": "si") ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
    </body>

</html>