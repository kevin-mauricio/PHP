<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
</head>
<body>
    <a href="index.php"><input type="button" value="INICIO"></a>
    <h1>Calcular salario</h1>
    <input type="text" placeholder="cantidad de horas" name="horas">
    <select name="turnos" id="">
        <option value="">--turno--</option>
        <option value="turnoDia">Día</option>
        <option value="turnoNoche">Noche</option>
    </select>
    <label for="checkbox"><input type="checkbox" name="domingoFestivo" id="checkbox">¿Domingo o festivo?</label>
    <input type="submit" value="Calcular" name="submit">
</body>
</html>


<?php

    if (isset($_REQUEST['submit'])) {

        $horas = $_REQUEST['horas'];
        $turno = $_REQUEST['turnos'];
        $domingoFestivo = $_REQUEST['domingoFestivo'];

        if ($turno == 'turnoDia') {
            $salario = $horas * 50000;
        } else if ($turno == 'turnoNoche') {
            $salario = $horas * 80000;
        }

        echo "Salario es: ", $salario;

    }



?>