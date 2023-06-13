<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <button><a href="index.php">Inicio</a></button>
    <h1>Información de los alumnos</h1>
    <?php
        if (empty($_REQUEST)){
            echo '<form action="" method="post">
                <label for="cant">ingrese la cantidad de alumnos</label>
                <input type="number" name="cantidad" id="cant">
                <input type="submit" name="submit" value="Seguir">
            </form>';
        } else if (isset($_REQUEST['cantidad'])) {
            $cantAlumnos = $_REQUEST['cantidad'];
            echo '<h2>Ingrese la información solicitada</h2>';
            echo '<form action="" method="post">';
            for ($i = 0; $i < $cantAlumnos; $i++) {
                echo '<label for="codigo">Alumno ' . ($i+1) . '</label>
                    <label for="codigo">Codigo</label>
                    <input type="text" name="codigo[]" id="codigo">
                    <label for="nombres">Nombres</label>
                    <input type="text" name="nombres[]" id="nombres">
                    <br>
                    <label for="notas">Notas</label>
                    <input type="number" placeholder="Nota 1" name="nota1[]" id="nota1">
                    <input type="number" placeholder="Nota 2" name="nota2[]" id="nota2">
                    <input type="number" placeholder="Nota 3" name="nota3[]" id="nota3">
                    <hr>';
            }
            echo '<input type="submit" name="calcular" value="calcular">
                </form>';
        
        } else if (isset($_REQUEST['calcular'])) {
            $nombres = $_REQUEST['nombres'];
            $nota1 = $_REQUEST['nota1'];
            $nota2 = $_REQUEST['nota2'];
            $nota3 = $_REQUEST['nota3'];
            $promedios = array();
        
            for ($i = 0; $i < count($nombres); $i++) {
                $promedio = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;
                $promedios[] = $promedio;
            }
            
            $index = 1;
            $promedioMayor = 0;
            foreach ($promedios as $promedio) {
                echo 'Alumno '.$nombres[$index-1];
                echo '<p>Promedio: '. $promedio . '</p>';
                if ($promedio >= $promedioMayor){
                    $promedioMayor = $promedio;
                    $iAlumno = $index;
                    $nombre = $nombres[$index-1];
                }
                $index++;
            }
            echo '<h3>El promedio mayor es '.$promedioMayor.' del alumno '.$nombre.'</h3>';
        }
        
    ?>
</body>

